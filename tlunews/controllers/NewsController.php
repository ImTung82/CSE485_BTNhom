
<?php
    require_once __DIR__ . '/../models/News.php';

    class NewsController {
      
      
      
        //Xóa 
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if (isset($_GET['id'])) {
                $newsModel = new News();
                $id = intval($_GET['id']);
        
                // Gọi hàm delete từ model
                $deleted = $newsModel->deleteNewsById($id);
        
                if ($deleted) {
                    // Xóa thành công, quay lại trang dashboard
                    header('Location: ../views/admin/dashboard.php?status=success');
                    exit;
                } else {
                    // Xóa thất bại, báo lỗi
                    header('Location: ../views/admin/dashboard.php?status=error');
                    exit;
                }
            } else {
                // Không có ID, báo lỗi
                header('Location: ../views/admin/dashboard.php?status=invalid');
                exit;
            }
        }
    }
?>