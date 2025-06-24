<?php

/**
 * Classe com funções utilitárias gerais
 */
class Helper {
    
    /**
     * Sanitizar string HTML
     */
    public static function sanitize($string) {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Formatar data para exibição
     */
    public static function formatDate($date, $format = 'd/m/Y') {
        $timestamp = is_string($date) ? strtotime($date) : $date;
        return date($format, $timestamp);
    }

    /**
     * Formatar data e hora para exibição
     */
    public static function formatDateTime($datetime, $format = 'd/m/Y H:i:s') {
        $timestamp = is_string($datetime) ? strtotime($datetime) : $datetime;
        return date($format, $timestamp);
    }

    /**
     * Truncar texto com ellipsis
     */
    public static function truncate($text, $length = 100, $ellipsis = '...') {
        if (strlen($text) <= $length) {
            return $text;
        }
        return substr($text, 0, $length) . $ellipsis;
    }

    /**
     * Gerar slug a partir de um texto
     */
    public static function slug($text) {
        // Converter para minúsculas
        $text = strtolower($text);
        
        // Remover acentos
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        
        // Remover caracteres especiais
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        
        // Substituir espaços e múltiplos hífens por um hífen
        $text = preg_replace('/[\s-]+/', '-', $text);
        
        // Remover hífens do início e fim
        return trim($text, '-');
    }

    /**
     * Verificar se email é válido
     */
    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Gerar hash de senha
     */
    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verificar senha
     */
    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    /**
     * Redirecionar para uma URL
     */
    public static function redirect($url) {
        header("Location: {$url}");
        exit;
    }

    /**
     * Obter URL base do projeto
     */
    public static function baseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $script = dirname($_SERVER['SCRIPT_NAME']);
        return $protocol . '://' . $host . $script;
    }

    /**
     * Gerar URL completa
     */
    public static function url($path = '') {
        return self::baseUrl() . '/' . ltrim($path, '/');
    }

    /**
     * Debug - dump de variável
     */
    public static function dump($var, $die = false) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        if ($die) {
            die();
        }
    }

    /**
     * Obter valor de array com fallback
     */
    public static function arrayGet($array, $key, $default = null) {
        return $array[$key] ?? $default;
    }

    /**
     * Validar CSRF token
     */
    public static function validateCsrf($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    /**
     * Gerar CSRF token
     */
    public static function generateCsrf() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Formatar bytes para tamanho legível
     */
    public static function formatBytes($size, $precision = 2) {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        
        return round($size, $precision) . ' ' . $units[$i];
    }

    /**
     * Verificar se string contém outra string (case insensitive)
     */
    public static function contains($haystack, $needle) {
        return stripos($haystack, $needle) !== false;
    }

    /**
     * Gerar ID único
     */
    public static function generateId($prefix = '') {
        return $prefix . uniqid() . mt_rand(1000, 9999);
    }
} 