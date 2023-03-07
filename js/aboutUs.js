var map = L.map('map').setView([48.036978, 7.643491], 14);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([48.036978, 7.643491]).addTo(map);
marker.bindPopup("Kaiserstuhl Escape").openPopup();