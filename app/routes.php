<?php

/**
 * Definição de rotas da aplicação
 */

// Carregar dependências
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/View.php';

// Inicializar router
$router = new Router();

// Página inicial
$router->get('/', 'HomeController@index');
$router->get('/index', 'HomeController@index');

// Página sobre
$router->get('/sobre', 'SobreController@index');

// Página de serviços
$router->get('/servicos', 'ServicosController@index');

// Página de novidades
$router->get('/novidades', 'NovidadesController@index');

// Autenticação
$router->get('/login', 'AuthController@login');    // Formulário de login
$router->post('/login', 'AuthController@login');   // Processar login
$router->get('/logout', 'AuthController@logout');  // Logout

// Rota 404 personalizada
$router->notFound(function() {
    echo View::render('errors.404', [
        'title' => '404 - Página não encontrada',
        'currentPage' => '404'
    ]);
});

// Executar roteamento
try {
    $router->run();
} catch (Exception $e) {
    // Log do erro
    error_log("Erro no roteamento: " . $e->getMessage());
    
    // Renderizar página de erro 500
    echo View::render500($e->getMessage());
} 