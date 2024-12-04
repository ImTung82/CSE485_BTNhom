<?php
    require_once(__DIR__ . '/../models/News.php');
    class NewsController {
        public function add() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_POST['image'] ?? '';
                $dateCreated = $_POST['dateCreated'] ?? '';
                $categoryId = $_POST['categoryId'] ?? '';

                $news = new News();
                $news->addNews($title, $content, $image, $dateCreated, $categoryId);

                header("Location: views/admin/dashboard.php");
                exit();
            }
            
            include __DIR__ . '/views/admin/news/add.php';
        }
          
        public function getEditNews() {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $news = new News();
                $newsEdit = $news->getNewsById($id);

                return $newsEdit;
            }
        }

        public function update() {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $image = $_POST['image'] ?? '';
                $dateCreated = $_POST['dateCreated'];
                $categoryId = intval($_POST['categoryId']);
    
        
                $news = new News();
                $updateStatus = $news->updateNews($id, $title, $content, $dateCreated, $categoryId, $image);
        
                if ($updateStatus) {
                    header('Location: views/admin/dashboard.php');
                    exit;
                } else {
                    die('Failed to update news!');
                }
            } else {
                die('Invalid request!');
            }
        }

        public function delete() {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
                $id = $_GET['id'];
        
                $news = new News();
                $news->deleteNews($id);
        
                header("Location: views/admin/dashboard.php");
                exit();
            }
            echo "Yêu cầu không hợp lệ.";
        }
    }
?>