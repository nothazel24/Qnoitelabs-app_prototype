#!/bin/bash

# Ini digunakan untuk pengguna fedora yang dimana SELinux nya itu sangat ketat. 
# Eksekusi kembali kode ini apabila ada gambar/file yang baru ditambahkan kembali dan tidak terdeteksi oleh browser

# sedikit saran, matikan SELinux untuk sementara dalam pengembangan website dengan menggunakan fedora os

sudo chcon -Rt svirt_sandbox_file_t .
sudo chcon -Rt svirt_sandbox_file_t public
sudo chcon -Rt svirt_sandbox_file_t storage

echo "Proses selesai..."