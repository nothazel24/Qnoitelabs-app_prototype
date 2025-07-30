#!bin/bash

sudo chcon -Rt svirt_sandbox_file_t .
sudo chcon -Rt svirt_sandbox_file_t public
sudo chcon -Rt svirt_sandbox_file_t storage

echo "Proses selesai"