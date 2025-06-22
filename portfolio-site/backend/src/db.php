<?php
$dotenv = parse_ini_file(__DIR__.'/../.env');
$pdo = new PDO(
    sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $dotenv['DB_HOST'], $dotenv['DB_NAME']),
    $dotenv['DB_USER'],
    $dotenv['DB_PASS'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
