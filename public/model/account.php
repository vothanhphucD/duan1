<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'connect.php';

    class acc_lass extends dao_con {
        public function regAcc($firstName, $lastName, $email, $pass) {
            $sql = "INSERT INTO account(account_firstName, account_lastName, account_email, account_pass) VALUES(?, ?, ?, ?)";
            return $this->conn_execute($sql, $firstName, $lastName, $email, $pass);
        }

        public function logAcc($email, $pass) {
            $sql = "SELECT * FROM account WHERE account_email = ? AND account_pass = ?";
            return $this->conn_show_one($sql, $email, $pass);
        }

        public function checkMail($email) {
            $sql = "SELECT account_email FROM account WHERE account_email = ?";
            return $this->conn_show_one($sql, $email);
        }

        

    }
?>