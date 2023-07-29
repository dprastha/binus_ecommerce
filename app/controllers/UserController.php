<?php

require_once 'models/User.php';

class UserController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $userModel = new UserModel($this->db);
        $users = $userModel->getAllUsers();
        include 'views/users.php';
    }

    // Add other controller actions based on user requests (e.g., create, update, delete)
}
