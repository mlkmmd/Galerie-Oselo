<?php
class Warehouse {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    // Récupérer tous les entrepôts
    public function getAllWarehouses() {
        $query = "SELECT w.*, COUNT(a.id) as artwork_count 
                 FROM warehouses w 
                 LEFT JOIN artworks a ON w.id = a.warehouse_id 
                 GROUP BY w.id 
                 ORDER BY w.name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    // Récupérer un entrepôt par son ID
    public function getWarehouseById($id) {
        $query = "SELECT * FROM warehouses WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    // Ajouter un nouvel entrepôt
    public function addWarehouse($name, $address) {
        $query = "INSERT INTO warehouses (name, address) VALUES (:name, :address)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    // Mettre à jour un entrepôt existant
    public function updateWarehouse($id, $name, $address) {
        $query = "UPDATE warehouses SET name = :name, address = :address WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    // Supprimer un entrepôt
    public function deleteWarehouse($id) {
        // D'abord, mettre à null les références dans les œuvres
        $query1 = "UPDATE artworks SET warehouse_id = NULL WHERE warehouse_id = :id";
        $stmt1 = $this->db->prepare($query1);
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();
        
        // Ensuite, supprimer l'entrepôt
        $query2 = "DELETE FROM warehouses WHERE id = :id";
        $stmt2 = $this->db->prepare($query2);
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt2->execute();
    }
}

