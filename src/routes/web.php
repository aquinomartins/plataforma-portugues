<?php
// src/routes/web.php

// Carrega o bootstrap (autoloader e .env)
require_once __DIR__ . '/../bootstrap.php';

// Lê a rota da URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/' || $path === '/index.php') {
    require __DIR__ . '/../views/home.php';
} elseif ($path === '/health') {
    header('Content-Type: text/plain', true, 200);
    echo 'OK';
} else {
    header('Content-Type: text/plain', true, 404);
    echo '404 — Não encontrado';
}
