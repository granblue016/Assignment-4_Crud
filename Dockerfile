FROM php:8.2-apache

# Cài đặt các extension PHP cần thiết cho Yii2 và PostgreSQL/PostGIS
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip

# Enable Apache Rewrite module cho Yii2 URLs
RUN a2enmod rewrite

# Copy mã nguồn vào thư mục web của apache
COPY . /var/www/html/

# Cấu hình DocumentRoot trỏ vào thư mục web của Yii2
RUN sed -i 's!/var/www/html!/var/www/html/web!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80