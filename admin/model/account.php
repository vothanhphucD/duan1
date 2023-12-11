<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once 'connect.php';
    class account extends dao_con {
        public function show_account() {
            $sql = "SELECT * FROM account ORDER BY account_id DESC";
            return $this->conn_show_all($sql);
        }
    }
?>