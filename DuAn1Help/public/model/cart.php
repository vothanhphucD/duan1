<?php
    include 'connect.php';
    class cart_lass extends dao_con {
       

      

       

        public function use_voucher($a) {
            $sql = "UPDATE discount_code SET code_qty = code_qty - 1 WHERE code_gift = ?";
            return $this->conn_execute($sql, $a);
        }
    }
?>