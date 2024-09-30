<?php
// Redirect root requests to Swagger UI
if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php') {
    header('Location: /swagger-ui/dist/index.html');
    exit();
}

// Serve the requested resource as-is
$path = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (file_exists($path)) {
    return false;
}

// Handle 404 error
http_response_code(404);
echo "Resource not found";
