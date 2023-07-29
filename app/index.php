<?php
require_once 'config/database.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/ItemController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller = new ItemController($db);
        $controller->index();
        break;

    case 'add':
        $controller = new ItemController($db);
        $controller->add();
        break;

    case 'edit':
        $controller = new ItemController($db);
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->edit($id);
        break;

    case 'delete':
        $controller = new ItemController($db);
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->delete($id);
        break;

    case 'dashboard':
        $controller = new DashboardController($db);
        $controller->index();
        break;

    default:
        echo '404 - Page not found';
        break;
}
