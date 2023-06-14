# Curl Client

Curl Client is a PHP-based HTTP client library. This library allows you to easily make HTTP requests such as GET, POST, PUT, DELETE, etc. using cURL.

## Features

- Supports various request types like HTTP GET, POST, PUT, DELETE, HEAD, OPTIONS, PATCH.
- Provides advanced cURL options such as custom headers, authentication, session management, proxy support, etc.
- Includes useful features like request tracking, timeout settings, SSL verification, follow redirects, etc.

## Installation

You can add Curl Client to your project using Composer. Add the following line to your `composer.json` file:

```json
"require": {
    "zweqxrd/curl-client": "1.0.0"
}
```

Or

```cmd
composer require zweqxrd/curl-client
```

Then run the composer install command in your terminal to add Curl Client to your project.

## Usage

```php
<?php

require 'vendor/autoload.php';

use Jesuzweq\Curl;

Curl::Initialize();

// GET request
Curl::Get('https://api.example.com/users');
$response = Curl::Response();
echo $response;

// POST request
Curl::Post('https://api.example.com/users', ['name' => 'John Doe', 'email' => 'john@example.com']);
$response = Curl::Response();
echo $response;

// PUT request
Curl::Put('https://api.example.com/users/1', ['name' => 'Updated Name']);
$response = Curl::Response();
echo $response;

// DELETE request
Curl::Delete('https://api.example.com/users/1');
$response = Curl::Response();
echo $response;

Curl::Close();
```

- 
