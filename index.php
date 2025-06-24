<?php
/**
 * Front Controller da aplicação Commit Crimes™
 * 
 * Este arquivo é o ponto de entrada único da aplicação.
 * Todas as requisições passam por aqui e são roteadas adequadamente.
 */

// Iniciar sessão
session_start();

// Configurar timezone
date_default_timezone_set('America/Sao_Paulo');

// Configurar error reporting para desenvolvimento
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Definir constantes da aplicação
define('APP_ROOT', __DIR__);
define('APP_PATH', APP_ROOT . '/app');
define('ASSETS_PATH', APP_ROOT . '/assets');

// Função de autoload simples para carregar classes automaticamente
spl_autoload_register(function ($class) {
    $paths = [
        APP_PATH . '/core/' . $class . '.php',
        APP_PATH . '/models/' . $class . '.php',
        APP_PATH . '/controllers/' . $class . '.php'
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Carregar e executar as rotas
require_once APP_PATH . '/routes.php'; 