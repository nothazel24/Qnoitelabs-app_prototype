var map = L.map('map').setView([-7.033714, 107.660249], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-7.033714, 107.660249]).addTo(map)
    .bindPopup('Kantor kami')
    .openPopup();