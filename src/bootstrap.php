<?php
declare(strict_types=1);

// Carrega o autoloader do Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Inicializa o Dotenv para carregar variáveis de ambiente do arquivo .env
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

// Inicia a sessão PHP
session_start();
