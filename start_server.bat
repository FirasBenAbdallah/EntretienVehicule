@echo off
REM Start the PHP server
REM start php -S localhost:8000 -t . router.php
start php -S 192.168.1.14:8000 -t . router.php

REM Wait a few seconds to ensure the server has started
timeout /t 2 > nul

REM Open the Swagger UI in the default web browser
REM start http://localhost:8000
start http://192.168.1.14:8000
