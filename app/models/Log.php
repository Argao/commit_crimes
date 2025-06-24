<?php

require_once __DIR__ . '/../core/Model.php';

class Log extends Model {
    protected $table = 'logs';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Buscar todos os logs ordenados por data
     */
    public function getAll($orderBy = 'data_publicacao DESC, id DESC') {
        return parent::getAll($orderBy);
    }

    /**
     * Buscar logs recentes para homepage
     */
    public function getRecent($limit = 5) {
        return $this->where('1=1', [], 'data_publicacao DESC, id DESC', $limit);
    }

    /**
     * Buscar logs por período
     */
    public function getByPeriod($startDate, $endDate) {
        return $this->where(
            'data_publicacao BETWEEN :start_date AND :end_date',
            ['start_date' => $startDate, 'end_date' => $endDate],
            'data_publicacao DESC'
        );
    }

    /**
     * Buscar logs por palavra-chave
     */
    public function search($keyword) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE titulo LIKE :keyword 
                OR conteudo LIKE :keyword 
                ORDER BY data_publicacao DESC";
        
        $params = ['keyword' => "%{$keyword}%"];
        return $this->query($sql, $params);
    }

    /**
     * Formatar data de publicação
     */
    public function formatDataPublicacao($data) {
        $timestamp = strtotime($data);
        return date('d/m/Y', $timestamp);
    }

    /**
     * Formatar data de publicação completa
     */
    public function formatDataCompleta($data) {
        $timestamp = strtotime($data);
        return date('d/m/Y H:i:s', $timestamp);
    }

    /**
     * Validar dados do log
     */
    public function validate($data) {
        $errors = [];

        if (empty($data['titulo'])) {
            $errors['titulo'] = 'Título é obrigatório';
        } elseif (strlen($data['titulo']) > 150) {
            $errors['titulo'] = 'Título deve ter no máximo 150 caracteres';
        }

        if (empty($data['conteudo'])) {
            $errors['conteudo'] = 'Conteúdo é obrigatório';
        }

        if (empty($data['data_publicacao'])) {
            $errors['data_publicacao'] = 'Data de publicação é obrigatória';
        } elseif (!strtotime($data['data_publicacao'])) {
            $errors['data_publicacao'] = 'Data de publicação deve ser uma data válida';
        }

        return $errors;
    }

    /**
     * Sanitizar dados antes de salvar
     */
    public function sanitizeData($data) {
        return [
            'titulo' => htmlspecialchars(trim($data['titulo']), ENT_QUOTES, 'UTF-8'),
            'conteudo' => htmlspecialchars(trim($data['conteudo']), ENT_QUOTES, 'UTF-8'),
            'data_publicacao' => $data['data_publicacao'] ?? date('Y-m-d')
        ];
    }

    /**
     * Criar log com data atual se não especificada
     */
    public function create($data) {
        if (!isset($data['data_publicacao'])) {
            $data['data_publicacao'] = date('Y-m-d');
        }
        return parent::create($data);
    }
} 