<?php

require_once __DIR__ . '/../core/Model.php';

class Servico extends Model {
    protected $table = 'servicos';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Buscar todos os serviços ordenados por ID
     */
    public function getAll($orderBy = 'id ASC') {
        return parent::getAll($orderBy);
    }

    /**
     * Buscar serviços em destaque para homepage
     */
    public function getFeatured($limit = 6) {
        return $this->where('1=1', [], 'id ASC', $limit);
    }

    /**
     * Buscar por palavra-chave no título ou descrição
     */
    public function search($keyword) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE titulo LIKE :keyword 
                OR descricao LIKE :keyword 
                ORDER BY titulo ASC";
        
        $params = ['keyword' => "%{$keyword}%"];
        return $this->query($sql, $params);
    }

    /**
     * Validar dados do serviço
     */
    public function validate($data) {
        $errors = [];

        if (empty($data['titulo'])) {
            $errors['titulo'] = 'Título é obrigatório';
        } elseif (strlen($data['titulo']) > 100) {
            $errors['titulo'] = 'Título deve ter no máximo 100 caracteres';
        }

        if (empty($data['descricao'])) {
            $errors['descricao'] = 'Descrição é obrigatória';
        }

        return $errors;
    }

    /**
     * Sanitizar dados antes de salvar
     */
    public function sanitizeData($data) {
        return [
            'titulo' => htmlspecialchars(trim($data['titulo']), ENT_QUOTES, 'UTF-8'),
            'descricao' => htmlspecialchars(trim($data['descricao']), ENT_QUOTES, 'UTF-8')
        ];
    }
} 