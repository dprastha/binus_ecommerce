<?php

require_once 'models/Item.php';

class DashboardController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $userModel = new ItemModel($this->db);
        $totalItems = $userModel->getTotalItems();
        $chartData = $userModel->getChartData();
        $leftItems = $userModel->getLeftItems();

        include 'views/Dashboard/index.php';
    }
}
