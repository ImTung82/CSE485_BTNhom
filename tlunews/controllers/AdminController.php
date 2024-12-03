<?php
    require_once(__DIR__ . '/../models/User.php');

    class AdminController {
        public function login() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
    
                $user = new User();
                $result = $user->validateLogin($username, $password);
                if ($result['success']) {
                    if ($result['role'] == 0) {
                        header("Location: views/home/index.php");
                        exit();
                    } elseif ($result['role'] == 1) {
                        header("Location: views/admin/dashboard.php");
                        exit();
                    }
                } else {
                    include __DIR__ . '/../views/admin/login.php';
                }
            } else {
                // Nếu là GET, hiển thị trang login
                include __DIR__ . '/../views/admin/login.php';
            }
        }
    }
?>