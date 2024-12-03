<?php
    require_once __DIR__ . '/controllers/AdminController.php';
    require_once __DIR__ . '/controllers/NewsController.php';

    $controller = $_GET['controller'] ?? 'index';
    $action = $_GET['action'] ?? 'index';

    if ($controller != null && $action != null) {
        if ($controller === 'admin') {
            switch ($action) {
                case 'index':
                    $admincontroller = new AdminController();
                    $admincontroller->index();
                    break; 
                case 'login':
                    $controller = new AdminController();
                    $controller->login();
                    break;
                // Các action khác...
                default:
                    echo "Trang không tồn tại.";
                    break;
            }
        }
    }
?>