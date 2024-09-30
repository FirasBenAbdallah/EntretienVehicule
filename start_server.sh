#!/bin/bash
# Start the PHP built-in server with router.php
php -S localhost:8000 -t . router.php &

# Wait for the server to start
sleep 2

# Open Swagger UI in the default web browser
xdg-open http://localhost:8000 || open http://localhost:8000
