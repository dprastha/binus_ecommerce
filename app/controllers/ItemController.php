<?php
require_once 'models/Item.php';

class ItemController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $itemModel = new ItemModel($this->db);
        $items = $itemModel->getAllItems();
        include 'views/Item/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $keterangan = $_POST['keterangan'];
            $satuan = $_POST['satuan'];

            $itemModel = new ItemModel($this->db);
            $itemModel->addItem($nama, $keterangan, $satuan);

            header('Location: index.php');
            exit;
        }

        include 'views/Item/add.php';
    }

    public function edit($id)
    {
        $itemModel = new ItemModel($this->db);
        $item = $itemModel->getItemById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $keterangan = $_POST['keterangan'];
            $satuan = $_POST['satuan'];

            $itemModel->updateItem($id, $nama, $keterangan, $satuan);

            header('Location: index.php');
            exit;
        }

        include 'views/Item/edit.php';
    }

    public function delete($id)
    {
        $itemModel = new ItemModel($this->db);
        $itemModel->deleteItem($id);

        header('Location: index.php');
        exit;
    }
}
