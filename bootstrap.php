<?php

// index.php hoặc bootstrap.php (tùy thuộc vào cấu trúc ứng dụng của bạn)
require_once 'vendor/autoload.php';  // Đảm bảo bạn đã tải autoload từ composer

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();  // Tải các giá trị từ file .env

// Lấy thông tin từ .env
$googleClientId = $_ENV['GOOGLE_CLIENT_ID'];
$googleClientSecret = $_ENV['GOOGLE_CLIENT_SECRET'];
$googleRedirectUri = $_ENV['GOOGLE_REDIRECT_URI'];
