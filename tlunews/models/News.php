<?php
    require_once __DIR__ . '/../libs/DBConnection.php';

    class News {
        public function getAllNews() {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }

            try {
                // Truy vấn tất cả dữ liệu từ bảng news
                $sql = "SELECT id, title, content, image, created_at, category_id FROM news";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Lấy tất cả dữ liệu và trả về
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu: " . $e->getMessage());
            }
        }

        public function getNewsById($id) {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
    
            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }
    
            try {
                // Truy vấn thông tin tin tức theo ID
                $sql = "SELECT id, title, content, image, created_at, category_id FROM news WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
    
                // Lấy dữ liệu tin tức và trả về
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu: " . $e->getMessage());
            }
        }

        

        public function deleteNewsById($id) {
            try {
                $sql = "DELETE FROM news WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
    
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

    }
?>