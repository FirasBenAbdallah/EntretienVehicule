@echo off
REM Start the PHP server
start php -S localhost:8000 -t . router.php

REM Wait a few seconds to ensure the server has started
timeout /t 2 > nul

REM Open the Swagger UI in the default web browser
start http://localhost:8000
