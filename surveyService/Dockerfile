FROM php:apache

# Включаем mod_rewrite
RUN a2enmod rewrite

# Копируем файлы проекта в контейнер
COPY . /var/www/html/

# Установка и включение расширения mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Перезапускаем Apache, чтобы изменения вступили в силу
RUN service apache2 restart

# Открываем порт 80
EXPOSE 80
