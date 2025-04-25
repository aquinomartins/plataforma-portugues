<?php
// public/db_test.php

// Carrega bootstrap (autoloader + .env) e configuração do banco
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/config/database.php';

// Testa a conexão
try {
    $stmt = $pdo->query('SELECT NOW()');
    echo 'MySQL OK: ' . $stmt->fetchColumn();
} catch (Exception $e) {
    echo 'Erro de conexão: ' . htmlspecialchars($e->getMessage());
}
