
<!-- Bootstrap 5 JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@latest/dist/leaflet.js"></script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    const locationUrl = "{{ App\Models\WebsiteSetting::first()->location ?? '' }}";
    let coordinates = null;

    if (locationUrl && typeof locationUrl === 'string') {
      try {
        const regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
        const matches = locationUrl.match(regex);
        if (matches && matches.length >= 3) {
          coordinates = [parseFloat(matches[1]), parseFloat(matches[2])];
        }
      } catch (e) {
        console.error("Error parsing coordinates:", e);
      }
    }

    const defaultCoords = [51.505, -0.09];
    const mapCenter = coordinates || defaultCoords;
    const map = L.map('map').setView(mapCenter, 13);

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
