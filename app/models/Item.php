<?php
class ItemModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllItems()
    {
        $query = "SELECT * FROM Barang";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add item to tabel Barang
    public function addItem($NamaBarang, $Keterangan, $Satuan)
    {
        $query = "INSERT INTO Barang (NamaBarang, Keterangan, Satuan) VALUES (:NamaBarang, :Keterangan, :Satuan)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':NamaBarang', $NamaBarang);
        $stmt->bindParam(':Keterangan', $Keterangan);
        $stmt->bindParam(':Satuan', $Satuan);
        return $stmt->execute();
    }

    // Get item by id
    public function getItemById($IdBarang)
    {
        $query = "SELECT * FROM Barang WHERE IdBarang = :IdBarang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':IdBarang', $IdBarang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //  Update item in tabel Barang
    public function updateItem($IdBarang, $NamaBarang, $Keterangan, $Satuan)
    {
        $query = "UPDATE Barang SET NamaBarang = :NamaBarang, Keterangan = :Keterangan, Satuan = :Satuan WHERE IdBarang = :IdBarang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':IdBarang', $IdBarang);
        $stmt->bindParam(':NamaBarang', $NamaBarang);
        $stmt->bindParam(':Keterangan', $Keterangan);
        $stmt->bindParam(':Satuan', $Satuan);
        return $stmt->execute();
    }

    // Delete item from tabel Barang
    public function deleteItem($IdBarang)
    {
        $query = "DELETE FROM Barang WHERE IdBarang = :IdBarang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':IdBarang', $IdBarang);
        return $stmt->execute();
    }
}
