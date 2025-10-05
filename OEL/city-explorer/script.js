const searchForm = document.getElementById('searchForm');
const cityInput = document.getElementById('cityInput');
const resultArea = document.getElementById('resultArea');
const cityTitle = document.getElementById('cityTitle');
const countryText = document.getElementById('countryText');
const coordsText = document.getElementById('coords');
const timezoneText = document.getElementById('timezone');
const mapContainer = document.getElementById('mapContainer');
const rawData = document.getElementById('rawData');
const populationText = document.getElementById('population');

searchForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const city = cityInput.value.trim();
  if (!city) return alert('Please enter a city name.');
  resultArea.style.display = 'none';
  const geo = await fetch(`api.php?city=${encodeURIComponent(city)}`).then(r => r.json());
  if (!geo.results || !geo.results.length) return alert('City not found.');
  const g = geo.results[0];
  const lat = g.geometry.lat, lng = g.geometry.lng;
  const name = g.formatted, country = g.components.country;
  cityTitle.textContent = name; countryText.textContent = country;
  coordsText.textContent = lat.toFixed(4)+', '+lng.toFixed(4);
  timezoneText.textContent = g.annotations.timezone.name;
  populationText.textContent = g.components.population || '—';
  mapContainer.innerHTML = `<iframe src="https://www.openstreetmap.org/export/embed.html?bbox=${lng-0.1}%2C${lat-0.06}%2C${lng+0.1}%2C${lat+0.06}&layer=mapnik&marker=${lat}%2C${lng}" style="border:1px solid #ddd;width:100%;height:300px;"></iframe>`;
  rawData.textContent = JSON.stringify(g, null, 2);
  resultArea.style.display = 'block';
});