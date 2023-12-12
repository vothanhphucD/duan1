<?php
    if (file_exists('model/connect.php')) {
        require "model/connect.php";
    }

    class order_lass extends dao_con {
       

        public function showOrderDetails($a) {
            $sql = "SELECT * FROM order_details WHERE order_id = ?";
            return $this->conn_show_all($sql, $a);
        }

        public function cancelOrder($a) {
            $sql = "UPDATE orders SET order_status = 'Đã hủy' WHERE order_id = ?";
            return $this->conn_execute($sql, $a);
        }

        public function check_id_pro($a) {
            $sql = "SELECT * FROM product WHERE product_id = ?";
            return $this->conn_show_one($sql, $a);
        }

        public function update_feedBack($a) {
            $sql = "UPDATE order_details SET details_feedback = 1 WHERE details_id = ?";
            return $this->conn_execute($sql, $a);
        }

        public function updateInfo($address, $sdt) {
            $sql = "UPDATE account SET account_address = ?, account_phone = ? WHERE account_id = ?";
            return $this->conn_execute($sql, $address, $sdt, $_SESSION['x_user']['account_id']);
        }
    }
?>