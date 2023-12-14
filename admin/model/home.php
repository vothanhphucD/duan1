<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once 'connect.php';
    class staticHome extends dao_con {
        public function show_account() {
            $sql = "SELECT * FROM account ORDER BY account_id DESC";
            return $this->conn_show_all($sql);
        }

        public function show_order() {
            $sql = "SELECT * FROM orders ORDER BY order_id DESC";
            return $this->conn_show_all($sql);
        }

        public function count_product() {
            $sql = "SELECT COUNT(product_id) AS tongSp FROM product ORDER BY product_id DESC";
            return $this->conn_show_one($sql);
        }

        public function old_year() {
            $sql = "SELECT time_reg FROM orders ORDER BY time_reg ASC LIMIT 1";
            return $this->conn_show_one($sql);
        }
    }
?>