<?php
    echo __DIR__;
    require_once(__DIR__ . '/../../controllers/AdminController.php');
    $adminController = new AdminController();
    $adminController->logout();
?>