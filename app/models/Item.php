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

    // Get total items
    public function getTotalItems()
    {
        $query = "SELECT COUNT(*) AS total FROM Barang";
        $stmt = $this->db->query($query);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['total'];
    }

    // Get left items
    public function getLeftItems()
    {
        $query = "SELECT SUM(b.JumlahPembelian - j.JumlahPenjualan) AS SisaBarang
        FROM Penjualan j
        JOIN Pembelian b ON j.IdBarang = b.IdBarang
        JOIN Barang brg ON j.IdBarang = brg.IdBarang";
        $stmt = $this->db->query($query);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['SisaBarang'];
    }

    public function getChartData()
    {
        $query = "SELECT 
        brg.NamaBarang,
        SUM(j.JumlahPenjualan * j.HargaJual) - SUM(b.JumlahPembelian * b.HargaBeli) AS Keuntungan
        FROM Penjualan j
        JOIN Pembelian b ON j.IdBarang = b.IdBarang
        JOIN Barang brg ON j.IdBarang = brg.IdBarang
        GROUP BY j.IdBarang, brg.IdPengguna";
        $stmt = $this->db->query($query);
        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$row['NamaBarang']] = $row['Keuntungan'];
        }

        return $data;
    }
}
