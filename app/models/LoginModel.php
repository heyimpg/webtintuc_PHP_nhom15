<?php

    class LoginModel extends Database
    {
        protected String $table = "taikhoan";
        
        function sign_in($userName, $passWord) {
            $query_account = "SELECT * FROM $this->table";
            $result = $this->conn->prepare($query_account);
            $result->execute();
            $accounts = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach($accounts as $account) {
                if($account['TaiKhoan'] == $userName && password_verify($passWord, $account['MatKhau'])) {
                    return 1;
                }
            }
            return 0;
        }

        function sign_up($userName, $passWord) {
            $query_account = "SELECT * FROM $this->table";
            $result = $this->conn->prepare($query_account);
            $result->execute();
            $accounts = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach($accounts as $account) {
                if($account['TaiKhoan'] == $userName) {
                    return -1;
                }
            }
            $password_encode = password_hash($passWord, PASSWORD_DEFAULT); 
            $query = "INSERT INTO $this->table(TaiKhoan, MatKhau) VALUES(?,?)";
            $result = $this->conn->prepare($query);
            $result->execute([$userName,$password_encode]);
            return $result->rowCount();
        }
    }
?>