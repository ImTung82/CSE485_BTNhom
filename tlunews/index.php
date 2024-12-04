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
                    $admincontroller = new AdminController();
                    $admincontroller->login();
                    break;
                case 'add':
                    $admincontroller = new AdminController();
                    $admincontroller->add();
<<<<<<< Updated upstream

                case 'edit':
                    $admincontroller = new AdminController();
                    $admincontroller->edit();

=======
                case 'update':
                    $admincontroller = new AdminController();
                    $admincontroller->update();
>>>>>>> Stashed changes
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