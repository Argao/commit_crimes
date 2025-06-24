<?php

/**
 * Sistema de roteamento da aplicação
 */
class Router {
    private $routes = [];
    private $notFoundCallback;

    /**
     * Registrar rota GET
     */
    public function get($pattern, $callback) {
        $this->addRoute('GET', $pattern, $callback);
    }

    /**
     * Registrar rota POST
     */
    public function post($pattern, $callback) {
        $this->addRoute('POST', $pattern, $callback);
    }

    /**
     * Registrar rota para qualquer método
     */
    public function any($pattern, $callback) {
        $this->addRoute('*', $pattern, $callback);
    }

    /**
     * Adicionar rota ao registro
     */
    private function addRoute($method, $pattern, $callback) {
        $this->routes[] = [
            'method' => $method,
            'pattern' => $this->convertPattern($pattern),
            'callback' => $callback,
            'original_pattern' => $pattern
        ];
    }

    /**
     * Converter padrão de rota em regex
     */
    private function convertPattern($pattern) {
        // Escapar caracteres especiais exceto {}
        $pattern = preg_quote($pattern, '/');
        
        // Converter {param} em grupos nomeados
        $pattern = preg_replace('/\\\{([a-zA-Z0-9_]+)\\\}/', '(?P<$1>[^/]+)', $pattern);
        
        // Converter {param?} em grupos opcionais
        $pattern = preg_replace('/\\\{([a-zA-Z0-9_]+)\\\?\\\}/', '(?P<$1>[^/]*)', $pattern);
        
        return '/^' . $pattern . '$/';
    }

    /**
     * Definir callback para 404
     */
    public function notFound($callback) {
        $this->notFoundCallback = $callback;
    }

    /**
     * Executar roteamento
     */
    public function run() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $this->getRequestUri();

        foreach ($this->routes as $route) {
            if ($route['method'] !== '*' && $route['method'] !== $requestMethod) {
                continue;
            }

            if (preg_match($route['pattern'], $requestUri, $matches)) {
                // Extrair parâmetros nomeados
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                // Executar callback
                return $this->executeCallback($route['callback'], $params);
            }
        }

        // Nenhuma rota encontrada
        return $this->handle404();
    }

    /**
     * Obter URI da requisição
     */
    private function getRequestUri() {
        $uri = $_SERVER['REQUEST_URI'];
        
        // Remover query string
        $pos = strpos($uri, '?');
        if ($pos !== false) {
            $uri = substr($uri, 0, $pos);
        }
        
        // Remover trailing slash
        $uri = rtrim($uri, '/');
        
        // Se vazio, definir como /
        if (empty($uri)) {
            $uri = '/';
        }

        return $uri;
    }

    /**
     * Executar callback da rota
     */
    private function executeCallback($callback, $params = []) {
        if (is_string($callback)) {
            // Formato: 'Controller@method'
            if (strpos($callback, '@') !== false) {
                [$controller, $method] = explode('@', $callback);
                return $this->callControllerMethod($controller, $method, $params);
            }
            
            // Formato: 'Controller::method'
            if (strpos($callback, '::') !== false) {
                [$controller, $method] = explode('::', $callback);
                return $this->callControllerMethod($controller, $method, $params);
            }
        }

        if (is_callable($callback)) {
            return call_user_func_array($callback, [$params]);
        }

        throw new Exception("Callback inválido para rota");
    }

    /**
     * Chamar método do controller
     */
    private function callControllerMethod($controllerName, $method, $params) {
        $controllerClass = $controllerName;
        $controllerFile = __DIR__ . "/../controllers/{$controllerClass}.php";

        if (!file_exists($controllerFile)) {
            throw new Exception("Controller {$controllerClass} não encontrado");
        }

        require_once $controllerFile;

        if (!class_exists($controllerClass)) {
            throw new Exception("Classe {$controllerClass} não encontrada");
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $method)) {
            throw new Exception("Método {$method} não encontrado no controller {$controllerClass}");
        }

        return $controller->$method($params);
    }

    /**
     * Lidar com 404
     */
    private function handle404() {
        http_response_code(404);
        
        if ($this->notFoundCallback) {
            return $this->executeCallback($this->notFoundCallback);
        }

        // 404 padrão
        echo "404 - Página não encontrada";
    }

    /**
     * Gerar URL para rota nomeada (futuro)
     */
    public function url($name, $params = []) {
        // TODO: Implementar rotas nomeadas
        return '/';
    }

    /**
     * Redirecionar para URL
     */
    public function redirect($url, $statusCode = 302) {
        http_response_code($statusCode);
        header("Location: {$url}");
        exit;
    }

    /**
     * Obter todas as rotas registradas
     */
    public function getRoutes() {
        return $this->routes;
    }
} 