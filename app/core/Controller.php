<?php

/**
 * Classe base para todos os controllers
 * Fornece funcionalidades comuns de renderização e redirecionamento
 */
abstract class Controller {
    protected $view;
    protected $data = [];

    public function __construct() {
        $this->view = new View();
    }

    /**
     * Renderizar uma view
     */
    protected function view($viewName, $data = []) {
        // Extrair variáveis para a view
        extract($data);
        
        $viewPath = __DIR__ . "/../views/{$viewName}.php";
        
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            throw new Exception("View '{$viewName}' não encontrada");
        }
    }

    /**
     * Renderizar view com layout
     */
    protected function render($view, $data = [], $layout = 'main') {
        // Mesclar dados da instância com dados passados
        $allData = array_merge($this->data, $data);
        
        return View::render($view, $allData, $layout);
    }

    /**
     * Renderizar view parcial
     */
    protected function renderPartial($view, $data = []) {
        $allData = array_merge($this->data, $data);
        return View::renderPartial($view, $allData);
    }

    /**
     * Definir dados para a view
     */
    protected function setData($key, $value = null) {
        if (is_array($key)) {
            $this->data = array_merge($this->data, $key);
        } else {
            $this->data[$key] = $value;
        }
        return $this;
    }

    /**
     * Resposta JSON
     */
    protected function json($data = [], $statusCode = 200) {
        return View::json($data, $statusCode);
    }

    /**
     * Redirecionamento
     */
    protected function redirect($url, $statusCode = 302) {
        return View::redirect($url, $statusCode);
    }

    /**
     * Verificar se a requisição é POST
     */
    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Verificar se a requisição é GET
     */
    protected function isGet() {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    /**
     * Obter dados do POST
     */
    protected function getPost($key = null, $default = null) {
        if ($key === null) {
            return $_POST;
        }
        return $_POST[$key] ?? $default;
    }

    /**
     * Obter dados do GET
     */
    protected function getGet($key = null, $default = null) {
        if ($key === null) {
            return $_GET;
        }
        return $_GET[$key] ?? $default;
    }

    /**
     * Validar dados de entrada
     */
    protected function validate($data, $rules) {
        $errors = [];

        foreach ($rules as $field => $rule) {
            $fieldRules = explode('|', $rule);
            $value = $data[$field] ?? null;

            foreach ($fieldRules as $fieldRule) {
                $error = $this->validateField($field, $value, $fieldRule);
                if ($error) {
                    $errors[$field][] = $error;
                }
            }
        }

        return $errors;
    }

    /**
     * Validar campo individual
     */
    private function validateField($field, $value, $rule) {
        $ruleParts = explode(':', $rule);
        $ruleName = $ruleParts[0];
        $ruleValue = $ruleParts[1] ?? null;

        switch ($ruleName) {
            case 'required':
                if (empty($value)) {
                    return "O campo {$field} é obrigatório";
                }
                break;

            case 'min':
                if (strlen($value) < $ruleValue) {
                    return "O campo {$field} deve ter pelo menos {$ruleValue} caracteres";
                }
                break;

            case 'max':
                if (strlen($value) > $ruleValue) {
                    return "O campo {$field} deve ter no máximo {$ruleValue} caracteres";
                }
                break;

            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return "O campo {$field} deve ser um email válido";
                }
                break;

            case 'numeric':
                if (!is_numeric($value)) {
                    return "O campo {$field} deve ser numérico";
                }
                break;

            case 'alpha':
                if (!ctype_alpha($value)) {
                    return "O campo {$field} deve conter apenas letras";
                }
                break;

            case 'alphanumeric':
                if (!ctype_alnum($value)) {
                    return "O campo {$field} deve conter apenas letras e números";
                }
                break;
        }

        return null;
    }

    /**
     * Sanitizar dados de entrada
     */
    protected function sanitize($data) {
        if (is_array($data)) {
            return array_map([$this, 'sanitize'], $data);
        }

        // Remover tags HTML e PHP
        $data = strip_tags($data);
        
        // Converter caracteres especiais
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        
        // Remover espaços extras
        $data = trim($data);

        return $data;
    }

    /**
     * Obter dados da requisição POST
     */
    protected function getPostData($keys = null) {
        if ($keys === null) {
            return $this->sanitize($_POST);
        }

        if (is_string($keys)) {
            return $this->sanitize($_POST[$keys] ?? null);
        }

        if (is_array($keys)) {
            $data = [];
            foreach ($keys as $key) {
                $data[$key] = $this->sanitize($_POST[$key] ?? null);
            }
            return $data;
        }

        return null;
    }

    /**
     * Obter dados da requisição GET
     */
    protected function getGetData($keys = null) {
        if ($keys === null) {
            return $this->sanitize($_GET);
        }

        if (is_string($keys)) {
            return $this->sanitize($_GET[$keys] ?? null);
        }

        if (is_array($keys)) {
            $data = [];
            foreach ($keys as $key) {
                $data[$key] = $this->sanitize($_GET[$key] ?? null);
            }
            return $data;
        }

        return null;
    }

    /**
     * Verificar se é requisição AJAX
     */
    protected function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    /**
     * Definir mensagem flash
     */
    protected function setFlash($type, $message) {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $_SESSION['flash'][$type] = $message;
    }

    /**
     * Obter mensagem flash
     */
    protected function getFlash($type = null) {
        if (!isset($_SESSION)) {
            session_start();
        }

        if ($type === null) {
            $flash = $_SESSION['flash'] ?? [];
            unset($_SESSION['flash']);
            return $flash;
        }

        $message = $_SESSION['flash'][$type] ?? null;
        unset($_SESSION['flash'][$type]);
        return $message;
    }

    /**
     * Verificar se usuário está autenticado
     */
    protected function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Requerer autenticação
     */
    protected function requireAuth() {
        if (!$this->isAuthenticated()) {
            $this->redirect('/login');
        }
    }
} 