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

# Chạy composer install để tự động tạo thư mục vendor trên cloud
RUN composer install --no-dev --optimize-autoloader

# Trỏ Apache DocumentRoot vào thư mục web của Yii2
RUN sed -i 's!/var/www/html!/var/www/html/web!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80