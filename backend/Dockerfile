# PHP + FPM
FROM php:8.1-fpm

# 必要なパッケージインストール
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    zip \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip

# Composer インストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ
WORKDIR /var/www

# Laravelコピー
COPY src/ .

# 依存関係インストール
RUN composer install --no-dev --optimize-autoloader

# Nginx設定コピー
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# 権限設定
RUN chown -R www-data:www-data storage bootstrap/cache

# ポート
EXPOSE 10000

# 起動コマンド
CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php-fpm -D && nginx -g 'daemon off;'"]