<?php
    require_once(__DIR__ . '/../models/News.php');
    class HomeController {
        public function getDetails() {
            // Kiểm tra nếu có ID trong URL
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Tạo đối tượng News và lấy thông tin chi tiết của tin tức
                $news = new News();
                $newsDetails = $news->getNewsById($id);

                return $newsDetails;
            } else {
                // Nếu không có ID, chuyển hướng về trang chủ
                header('Location: index.php');
                exit();
            }
        }
    }
?>