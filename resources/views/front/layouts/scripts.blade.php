    <!-- Bootstrap 5 JS (no jQuery needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var locationUrl = "{{ App\Models\WebsiteSetting::first()->location ?? '' }}";
            var coordinates = null;

            try {
                var regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
                var matches = locationUrl.match(regex);
                if (matches && matches.length >= 3) {
                    coordinates = [parseFloat(matches[1]), parseFloat(matches[2])];
                }
            } catch (e) {
                console.error("Error parsing coordinates:", e);
            }

            var map = L.map('map').setView(coordinates || [51.505, -0.09], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            if (coordinates) {
                L.marker(coordinates).addTo(map)
                    .bindPopup('Your location')
                    .openPopup();
            }
        });
        </script>

