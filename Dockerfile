FROM php:8.2-apache

# Cài đặt extension và composer
RUN apt-get update && apt-get install -y libpq-dev libzip-dev zip unzip git
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip

# Cài đặt Composer chính thức từ image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy toàn bộ mã nguồn lên server
COPY . /var/www/html/

# Chạy composer install để tạo thư mục vendor
RUN composer install --no-dev --optimize-autoloader

# [QUAN TRỌNG] Tạo và phân quyền ghi cho các thư mục assets và runtime của Yii2
RUN mkdir -p /var/www/html/web/assets /var/www/html/runtime \
    && chmod -R 777 /var/www/html/web/assets /var/www/html/runtime

# Trỏ Apache DocumentRoot vào thư mục web của Yii2
RUN sed -i 's!/var/www/html!/var/www/html/web!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80