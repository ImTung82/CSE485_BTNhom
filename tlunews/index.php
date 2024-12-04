<?php
    require_once __DIR__ . '/controllers/AdminController.php';
    require_once __DIR__ . '/controllers/NewsController.php';

    $controller = $_GET['controller'] ?? 'index';
    $action = $_GET['action'] ?? 'index';

    if ($controller != null && $action != null) {
        switch ($controller) {
            case 'admin':
                switch ($action) {
                    case 'index':
                        $adminController = new AdminController();
                        $adminController->index();
                        break; 
                    case 'login':
                        $adminController = new AdminController();
                        $adminController->login();
                        break;
                }

            case 'news':
                switch ($action) {
                    case 'add':
                        $newsController = new NewsController();
                        $newsController->add();

                    case 'update':
                        $newsController = new NewsController();
                        $newsController->update();
                    
                    case 'delete':
                        $newsController = new NewsController();
                        $newsController->delete();
                        break;
                }
            
            default:
                $adminController = new AdminController();
                $adminController->index();
                break;
        }
    }
?>