<?php
// src/config/database.php

// Lê a URL do MySQL a partir da variável de ambiente JAWSDB_URL
$envUrl = getenv('JAWSDB_URL');
if (! $envUrl) {
    throw new RuntimeException('JAWSDB_URL não está definida');
}

// Parse da URL (formato mysql://usuário:senha@host:porta/banco)
$url = parse_url($envUrl);
$host     = $url['host'] ?? 'localhost';
$dbname   = ltrim($url['path'] ?? '', '/');
$username = $url['user'] ?? '';
$password = $url['pass'] ?? '';

// DSN para PDO
$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

// Cria a instância PDO
try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    throw new RuntimeException('Falha ao conectar ao banco: ' . $e->getMessage());
}
