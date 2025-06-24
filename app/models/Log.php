<?php

require_once __DIR__ . '/../config/Database.php';

class Log {
    private $db;
    private $table = 'logs';

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll($limit = null) {
        try {
            $query = "SELECT * FROM {$this->table} ORDER BY data_publicacao DESC, id DESC";
            if ($limit) {
                $query .= " LIMIT :limit";
            }
            
            $stmt = $this->db->prepare($query);
            if ($limit) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar logs: " . $e->getMessage());
        }
    }

    public function getById($id) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar log: " . $e->getMessage());
        }
    }

    public function getRecent($limit = 5) {
        return $this->getAll($limit);
    }

    public function create($data) {
        try {
            $query = "INSERT INTO {$this->table} (titulo, conteudo, data_publicacao) VALUES (:titulo, :conteudo, :data_publicacao)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':titulo', $data['titulo']);
            $stmt->bindParam(':conteudo', $data['conteudo']);
            $stmt->bindParam(':data_publicacao', $data['data_publicacao']);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao criar log: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            $query = "UPDATE {$this->table} SET titulo = :titulo, conteudo = :conteudo, data_publicacao = :data_publicacao WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':titulo', $data['titulo']);
            $stmt->bindParam(':conteudo', $data['conteudo']);
            $stmt->bindParam(':data_publicacao', $data['data_publicacao']);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao atualizar log: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao deletar log: " . $e->getMessage());
        }
    }

    public function formatDataPublicacao($data) {
        $timestamp = strtotime($data);
        return date('d/m/Y', $timestamp);
    }
} 