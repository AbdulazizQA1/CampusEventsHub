# Campus Events Hub (Phase 2 - PHP Version)

This repository contains the Phase 2 backend integration for the IT361 Mid-Project. 
The Campus Events Hub is a responsive web application that uses PHP to dynamically load events and process user registrations into a CSV data source.

## How to Run This Project
Because this project now uses PHP, it cannot be run by simply double-clicking the files. You must use a local server environment.

1. Install XAMPP (or a similar local server like MAMP/WAMP).
2. Start the **Apache** module in the XAMPP Control Panel.
3. Place the entire `CampusEventsHub` project folder inside your `C:\xampp\htdocs\` directory.
4. Open your web browser and navigate to: `http://localhost/CampusEventsHub/index.php`

## Project Features
* Modular architecture using PHP includes (header/footer).
* Dynamic event rendering from a centralized PHP array using GET parameters.
* Form data processing and validation using POST requests.
* Persistent data storage utilizing a flat CSV file (`registrations.csv`).