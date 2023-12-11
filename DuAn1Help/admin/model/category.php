<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once 'connect.php';

    class cate extends dao_con {
        public function showCate() {
            $sql = "SELECT category.*, IFNULL(COUNT(product.product_id), 0) as TongSanPham
                    FROM category
                    LEFT JOIN product ON category.category_id = product.category_id
                    GROUP BY category.category_id
                    ORDER BY category.category_id DESC
            ";
            return $this->conn_show_all($sql);
        }

        public function upCate($status, $id) {
            $sql = "UPDATE category SET category_status = ? WHERE category_id = ?";
            return $this->conn_execute($sql, $status, $id);
        }

        public function addCate($name) {
            $sql = "INSERT INTO category(category_name) VALUE(?)";
            return $this->conn_execute($sql, $name);
        }
    }
?>