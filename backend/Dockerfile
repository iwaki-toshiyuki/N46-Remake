# PHP 8.1 の公式イメージを使用
FROM php:8.1

# OS パッケージと PHP 拡張のインストール
# OS パッケージのインストール
# Git：composer install 時に使用
# unzip：zip 解凍用
# libzip-dev：PHP zip 拡張のビルドに必要
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install \
    pdo_mysql \
    zip

# Composer を公式イメージからコピー
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ（Laravel のルート）
WORKDIR /var/www