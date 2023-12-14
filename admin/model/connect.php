<?php
    class dao_con {
        function conn_db() {
            $sqlServer = "mysql:host=localhost; dbname=duan1_help";
            $username = "root";
            $password = "";
    
            try {
                $conn = new PDO($sqlServer, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Ket noi database that bai vi ' . $e->getMessage();
            }
            return $conn;
        }
    
        //Them Sua Xoa
        function conn_execute($sql) {
            $conn = $this->conn_db();
            $sqlBindParam = array_slice(func_get_args(), 1);
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlBindParam);
            } catch (PDOException $e) {
                throw $e;
            } finally {
                unset($conn);
            }
        }
    
        //Show Ra 1 Cai
        function conn_show_one($sql) {
            $conn = $this->conn_db();
            $sqlBindParam = array_slice(func_get_args(), 1);
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlBindParam);
                $ketqua = $stmt->fetch();
                return $ketqua;
            } catch (PDOException $e) {
                throw $e;
            } finally {
                unset($conn);
            }
        }
    
        //Show Nhieu Cai
        function conn_show_all($sql) {
            $conn = $this->conn_db();
            $sqlBindParam = array_slice(func_get_args(), 1);
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlBindParam);
                $ketqua = $stmt->fetchAll();
                return $ketqua;
            } catch (PDOException $e) {
                throw $e;
            } finally {
                unset($conn);
            }
        }
    }
?>