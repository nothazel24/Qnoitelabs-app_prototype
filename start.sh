#!bin/bash

# start project
sudo docker-compose up -d

# Jika localhost tidak dapat diakses jalankan kode ini
# sudo docker-compose exec app php artisan serve

sudo docker-compose exec npm npm run dev