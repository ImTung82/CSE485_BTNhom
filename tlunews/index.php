<?php
    require_once __DIR__ . '/controllers/AdminController.php';

    $action = $_GET['action'] ?? 'index';

    switch ($action) {
        case 'login':
            $controller = new AdminController();
            $controller->login();
            break;
        // Các action khác...
        default:
            echo "Trang không tồn tại.";
            break;
    }
?>