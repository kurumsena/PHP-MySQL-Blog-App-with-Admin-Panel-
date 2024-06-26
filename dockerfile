# İlk olarak bir base image seçiyoruz
FROM php:7.4-apache

# Çalışma dizinini ayarlıyoruz
WORKDIR /var/www/html

# Gerekli paketleri yüklüyoruz
RUN apt-get update && \
    apt-get install -y \
    vim \
    curl \
    git

# Gerekirse PHP eklentilerini yüklüyoruz
RUN docker-php-ext-install mysqli pdo_mysql

# Local dosyaları image içine kopyalıyoruz
COPY . .

# Port numarasını belirtiyoruz
EXPOSE 80

# Container çalıştığında çalışacak komut
CMD ["apache2-foreground"]
