<?php

require_once __DIR__ . '/Database.php';

/**
 * Classe base para todos os models
 * Fornece funcionalidades comuns de CRUD
 */
abstract class Model {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Buscar todos os registros
     */
    public function getAll($orderBy = null) {
        try {
            $sql = "SELECT * FROM {$this->table}";
            if ($orderBy) {
                $sql .= " ORDER BY {$orderBy}";
            }
            return $this->db->fetchAll($sql);
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar registros: " . $e->getMessage());
        }
    }

    /**
     * Buscar registro por ID
     */
    public function getById($id) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
            return $this->db->fetch($sql, ['id' => $id]);
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar registro: " . $e->getMessage());
        }
    }

    /**
     * Criar novo registro
     */
    public function create($data) {
        try {
            $stmt = $this->db->insert($this->table, $data);
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            throw new Exception("Erro ao criar registro: " . $e->getMessage());
        }
    }

    /**
     * Atualizar registro
     */
    public function update($id, $data) {
        try {
            return $this->db->update(
                $this->table, 
                $data, 
                "{$this->primaryKey} = :id", 
                ['id' => $id]
            );
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar registro: " . $e->getMessage());
        }
    }

    /**
     * Deletar registro
     */
    public function delete($id) {
        try {
            return $this->db->delete(
                $this->table, 
                "{$this->primaryKey} = :id", 
                ['id' => $id]
            );
        } catch (Exception $e) {
            throw new Exception("Erro ao deletar registro: " . $e->getMessage());
        }
    }

    /**
     * Contar registros
     */
    public function count($where = null, $params = []) {
        try {
            $sql = "SELECT COUNT(*) as total FROM {$this->table}";
            if ($where) {
                $sql .= " WHERE {$where}";
            }
            $result = $this->db->fetch($sql, $params);
            return $result['total'];
        } catch (Exception $e) {
            throw new Exception("Erro ao contar registros: " . $e->getMessage());
        }
    }

    /**
     * Verificar se registro existe
     */
    public function exists($id) {
        try {
            $sql = "SELECT 1 FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1";
            return (bool) $this->db->fetch($sql, ['id' => $id]);
        } catch (Exception $e) {
            throw new Exception("Erro ao verificar existência: " . $e->getMessage());
        }
    }

    /**
     * Buscar com condições customizadas
     */
    public function where($conditions, $params = [], $orderBy = null, $limit = null) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE {$conditions}";
            
            if ($orderBy) {
                $sql .= " ORDER BY {$orderBy}";
            }
            
            if ($limit) {
                $sql .= " LIMIT {$limit}";
            }
            
            return $this->db->fetchAll($sql, $params);
        } catch (Exception $e) {
            throw new Exception("Erro na consulta personalizada: " . $e->getMessage());
        }
    }

    /**
     * Executar SQL customizado
     */
    public function query($sql, $params = []) {
        try {
            return $this->db->fetchAll($sql, $params);
        } catch (Exception $e) {
            throw new Exception("Erro na consulta SQL: " . $e->getMessage());
        }
    }
} 