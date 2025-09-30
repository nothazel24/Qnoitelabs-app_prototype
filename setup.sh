#!/bin/bash

# Setup Project

# Build image
sudo docker compose up -d --build

# Konfigurasi
sudo docker compose exec app composer install
sudo docker compose exec app php artisan key:generate

sudo docker compose exec app php artisan migrate

# Tambahkan command dibawah jika kamu ingin memasukan seedernya juga
# sudo docker compose exec app php artisan migrate --seed

# Link ke storage
sudo docker compose exec app php artisan storage:link

# Optimisasi (Production)
sudo docker compose exec app php artisan config:cache
sudo docker compose exec app php artisan route:cache
sudo docker compose exec app php artisan view:cache

# NPM install
# Kamu bisa mengeksekusi kode dibawah ini kembali jika kamu memodifikasi package yang dibutuhkan
# Untuk clean installation, kamu perlu menghapus file node_modules & package-lock.json yang lama terlebih dahulu
# Jika sudah, kamu bisa mengeksekusi kode dibawah untuk memperbarui file node_modules mu

sudo docker compose exec npm npm install

# Start npm 
sudo docker compose exec npm npm run dev