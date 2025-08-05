#!bin/bash

# Setup Project

# Build image
sudo docker-compose build

# Konfigurasi
sudo docker-compose exec app composer install
sudo docker-compose exec app php artisan key:generate

sudo docker-compose exec app php artisan migrate

# Link ke storage
sudo docker-compose exec app php artisan storage:link

# NPM install
# Kamu bisa mengeksekusi kode dibawah ini kembali jika kamu memodifikasi package yang dibutuhkan
# Untuk clean installation, kamu perlu menghapus file node_modules & package-lock.json yang lama terlebih dahulu
# Jika sudah, kamu bisa mengeksekusi kode dibawah untuk memperbarui file node_modules mu

sudo docker-compose exec npm npm install

echo "Proses Selesai..."