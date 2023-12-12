<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'connect.php';

    class pro extends dao_con {
        

        public function add_p1($name, $price, $del, $qty, $des, $cateId) {
            $sql = "INSERT INTO product(product_name, product_price, product_del, product_qty, product_des, category_id) VALUES(?, ?, ?, ?, ?, ?)";
            return $this->conn_execute($sql, $name, $price, $del, $qty, $des, $cateId);
        }

        public function add_p2($a) {
            $sql = "INSERT INTO image_product (image_file, product_id)
                    SELECT ? AS image_file, product_id
                    FROM product
                    ORDER BY product_id DESC
                    LIMIT 1
            ";
            return $this->conn_execute($sql, $a);
        }
        
        public function showCate() {
            $sql = "SELECT category.*, IFNULL(COUNT(product.product_id), 0) as TongSanPham
                    FROM category
                    LEFT JOIN product ON category.category_id = product.category_id
                    GROUP BY category.category_id
                    ORDER BY category.category_id DESC
            ";
            return $this->conn_show_all($sql);
        }

        public function delPro($id) {
            $sql = "DELETE FROM product WHERE product_id = ?";
            return $this->conn_execute($sql, $id);
        }
        
        public function up_p1($name, $price, $del, $qty, $des, $cate, $pro_id) {
            $sql = "UPDATE product SET product_name = ?, product_price = ?, product_del = ?, product_qty = ?, product_des = ?, category_id = ? WHERE product_id = ?";
            return $this->conn_execute($sql, $name, $price, $del, $qty, $des, $cate, $pro_id);
        }
    }
?>