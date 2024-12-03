<?php
    require_once __DIR__ . '/controllers/AdminController.php';
    require_once __DIR__ . '/controllers/NewsController.php';

    $controller = $_GET['controller'] ?? 'index';
    $action = $_GET['action'] ?? 'index';
<<<<<<< Updated upstream

=======
        
>>>>>>> Stashed changes
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
                default:
                    echo "Trang không tồn tại.";
                    break;
            }
        }
    }
?>