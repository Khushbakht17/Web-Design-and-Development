# City Explorer

City Explorer lets you search for a city and view its location, timezone, map, and related data using the OpenCage API.
# File Structure
city-explorer/
│
├── index.html      → Main HTML interface (Bootstrap)
├── style.css       → Custom styling
├── script.js       → JavaScript logic for API requests
├── api.php         → PHP backend proxy for API key security
└── README.md       → Documentation and setup instructions

## Setup
1. Place this folder in `htdocs` (XAMPP) or `www` (WAMP`).
2. Get a free API key from [OpenCage](https://opencagedata.com/users/sign_up).
3. Open `api.php` and insert your key.
4. Start Apache, open: `http://localhost/city-explorer/index.html`.
5. Type a city name and explore!