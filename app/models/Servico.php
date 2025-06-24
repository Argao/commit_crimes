<?php

require_once __DIR__ . '/../config/Database.php';

class Servico {
    private $db;
    private $table = 'servicos';

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        try {
            $query = "SELECT * FROM {$this->table} ORDER BY id ASC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar serviços: " . $e->getMessage());
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
            throw new Exception("Erro ao buscar serviço: " . $e->getMessage());
        }
    }

    public function create($data) {
        try {
            $query = "INSERT INTO {$this->table} (titulo, descricao) VALUES (:titulo, :descricao)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':titulo', $data['titulo']);
            $stmt->bindParam(':descricao', $data['descricao']);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao criar serviço: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            $query = "UPDATE {$this->table} SET titulo = :titulo, descricao = :descricao WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':titulo', $data['titulo']);
            $stmt->bindParam(':descricao', $data['descricao']);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao atualizar serviço: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao deletar serviço: " . $e->getMessage());
        }
    }
} 