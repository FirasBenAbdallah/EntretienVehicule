# Vehicle Maintenance API Project

This project provides a backend API for managing vehicle maintenance operations, including:

- Daily follow-ups (`Suivis Quotidiens`)
- Cleaning records (`Nettoyages`)
- Fuel purchases (`Achats Carburant`)

The APIs are documented using **Swagger UI**, which provides an interactive interface for testing and understanding each of the available endpoints.

## Features

- Create and manage daily vehicle follow-ups (`Suivis Quotidiens`).
- Record and retrieve cleaning operations (`Nettoyages`).
- Record, retrieve, and delete fuel purchases (`Achats Carburant`).
- Interactive API documentation and testing using **Swagger UI**.

## Project Structure

- **controllers/**: Contains PHP files for managing incoming API requests.
- **functions/**: Holds reusable functions for various CRUD operations.
- **config/**: Database configuration files.
- **models/**: Defines the data structures used in the application.
- **swagger-ui/**: Holds the Swagger UI files for API documentation.
- **uploads/**: Directory where uploaded images and files are stored.

## Setting Up the Project

### Requirements

- PHP 7.4 or higher
- A web server (optional if using PHP's built-in server)
- Browser (to access Swagger UI)

### Running the Project

#### Linux/macOS

1. **Make the Script Executable**:

   First, make the script executable. In your project root directory, run:

   ```sh
   chmod +x start_server.sh

   ```

2. **Run the Script**:

   To start the server and automatically open the Swagger UI in your default browser, run:

   ```sh
   ./start_server.sh
   ```

#### Windows

1. **Run the Batch File**:

   Double-click `start_server.bat` in your project root directory to start the PHP server and open the Swagger UI in your default web browser.

### How the Project Works

- When the project starts, it automatically opens the **Swagger UI** at `http://localhost:8000`.
- The **Swagger UI** allows you to view and interact with all available API endpoints.
- The API endpoints support features like creating and managing records for vehicle maintenance tasks.

### API Documentation

The project uses **Swagger UI** for API documentation. When the server starts, Swagger UI will open in your default browser, and you'll see detailed information about each API, including:

- **Request parameters** and **response formats**.
- Example requests and responses.
- Ability to **interactively test** each endpoint.

### Important Files

- **`router.php`**: This file is used by the PHP built-in server to automatically redirect to the Swagger UI when you access `http://localhost:8000`.
- **`start_server.sh`** (Linux/macOS) and **`start_server.bat`** (Windows): These scripts start the PHP server and open the Swagger UI automatically in your default browser.
- **`swagger.yaml`**: Contains the OpenAPI specification used by Swagger UI to generate interactive documentation for the APIs.

## File Upload Information

- When creating new entries for **Suivis Quotidiens** or **Nettoyages**, images (`Preuve`, `PhotoAvant`, `PhotoApres`) are uploaded and stored in the `uploads/` directory.
- The API stores the file paths in the database for easy retrieval.

## Example Endpoints

- **POST `/controllers/CreateSuivi.php`**: Create a new `Suivi Quotidien`.
- **POST `/controllers/CreateNettoyage.php`**: Create a new `Nettoyage`.
- **GET `/controllers/GetAllNettoyages.php`**: Retrieve all `Nettoyages` records.
- **DELETE `/controllers/DeleteAchatCarburant.php`**: Delete a specific fuel purchase.

## Troubleshooting

### Common Issues

- **File Upload Fails**:

  - Ensure the `uploads/` directory has the correct write permissions.
  - Check the `php.ini` configuration to ensure `upload_max_filesize` and `post_max_size` are sufficient for the files you're uploading.

- **Swagger UI Not Opening**:
  - Ensure the server is running.
  - Make sure your browser allows pop-ups from the local server.

## Contributing

Contributions are welcome! If you'd like to improve the project, please feel free to fork it and submit a pull request.
