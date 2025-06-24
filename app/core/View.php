<?php

/**
 * Sistema de renderização de views e templates
 */
class View {
    private static $viewsPath = __DIR__ . '/../views/';
    private static $layoutsPath = __DIR__ . '/../views/layouts/';
    
    private $data = [];
    private $layout = 'main';
    private $title = 'Commit Crimes™';
    private $currentPage = '';

    public function __construct($data = []) {
        $this->data = $data;
    }

    /**
     * Renderizar view
     */
    public static function render($view, $data = [], $layout = 'main') {
        $instance = new self($data);
        $instance->layout = $layout;
        
        return $instance->renderView($view);
    }

    /**
     * Renderizar view sem layout
     */
    public static function renderPartial($view, $data = []) {
        $instance = new self($data);
        return $instance->renderViewOnly($view);
    }

    /**
     * Definir título da página
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Definir página atual (para menu ativo)
     */
    public function setCurrentPage($page) {
        $this->currentPage = $page;
        return $this;
    }

    /**
     * Definir layout
     */
    public function setLayout($layout) {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Adicionar dados
     */
    public function with($key, $value = null) {
        if (is_array($key)) {
            $this->data = array_merge($this->data, $key);
        } else {
            $this->data[$key] = $value;
        }
        return $this;
    }

    /**
     * Renderizar view completa com layout
     */
    private function renderView($view) {
        // Renderizar conteúdo da view
        $content = $this->renderViewOnly($view);
        
        // Se não há layout, retornar apenas o conteúdo
        if (!$this->layout) {
            return $content;
        }

        // Renderizar layout com conteúdo
        return $this->renderLayout($content);
    }

    /**
     * Renderizar apenas a view
     */
    private function renderViewOnly($view) {
        $viewFile = self::$viewsPath . str_replace('.', '/', $view) . '.php';
        
        if (!file_exists($viewFile)) {
            throw new Exception("View não encontrada: {$view}");
        }

        // Extrair variáveis para o escopo da view
        extract($this->data);
        
        // Capturar output
        ob_start();
        include $viewFile;
        return ob_get_clean();
    }

    /**
     * Renderizar layout
     */
    private function renderLayout($content) {
        $layoutFile = self::$layoutsPath . $this->layout . '.php';
        
        if (!file_exists($layoutFile)) {
            throw new Exception("Layout não encontrado: {$this->layout}");
        }

        // Dados disponíveis no layout
        $title = $this->title;
        $currentPage = $this->currentPage;
        
        // Extrair dados adicionais
        extract($this->data);

        // Capturar output
        ob_start();
        include $layoutFile;
        return ob_get_clean();
    }

    /**
     * Helper para incluir partial
     */
    public static function partial($view, $data = []) {
        echo self::renderPartial($view, $data);
    }

    /**
     * Helper para gerar URL
     */
    public static function url($path = '') {
        $baseUrl = rtrim($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'], '/');
        return $baseUrl . '/' . ltrim($path, '/');
    }

    /**
     * Helper para asset URL
     */
    public static function asset($path) {
        return self::url('assets/' . ltrim($path, '/'));
    }

    /**
     * Helper para verificar página ativa
     */
    public function isActive($page) {
        return $this->currentPage === $page ? 'active' : '';
    }

    /**
     * Escape HTML
     */
    public static function e($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Renderizar erro 404
     */
    public static function render404() {
        http_response_code(404);
        return self::render('errors.404', [
            'title' => '404 - Página não encontrada'
        ]);
    }

    /**
     * Renderizar erro 500
     */
    public static function render500($error = null) {
        http_response_code(500);
        return self::render('errors.500', [
            'title' => '500 - Erro interno',
            'error' => $error
        ]);
    }

    /**
     * JSON Response
     */
    public static function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Redirect Response
     */
    public static function redirect($url, $statusCode = 302) {
        http_response_code($statusCode);
        header("Location: {$url}");
        exit;
    }

    /**
     * Configurar paths das views
     */
    public static function setViewsPath($path) {
        self::$viewsPath = rtrim($path, '/') . '/';
    }

    /**
     * Configurar path dos layouts
     */
    public static function setLayoutsPath($path) {
        self::$layoutsPath = rtrim($path, '/') . '/';
    }
} 