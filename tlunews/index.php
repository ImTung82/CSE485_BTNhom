<?php
    require_once __DIR__ . '/controllers/AdminController.php';
    require_once __DIR__ . '/controllers/NewsController.php';

    $controller = $_GET['controller'] ?? 'index';
    $action = $_GET['action'] ?? 'index';

    switch ($action) {
        case 'index':
            $controller = new AdminController();
            $controller->index();
            break; 
        case 'login':
            $controller = new AdminController();
            $controller->login();
            break;
        // Các action khác...
        default:
            echo "Trang không tồn tại.";
            break;
        
    if ($controller != null && $action != null) {
        if ($controller === 'admin') {
            switch ($action) {
                case 'index':
                    $admincontroller = new AdminController();
                    $admincontroller->index();
                    break; 
                case 'login':
                    $admincontroller = new AdminController();
                    $admincontroller->login();
                    break;
                case 'add':
                    $admincontroller = new AdminController();
                    $admincontroller->add();

                case 'delete':
                    $admincontroller = new AdminController();
                    $admincontroller->delete();
                    break;

                default:
                    echo "Trang không tồn tại.";
                    break;
            }
        }
    }
?>