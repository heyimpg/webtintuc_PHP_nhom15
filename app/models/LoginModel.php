<?php

    class LoginModel extends Database
    {
        protected String $table = "login";
        
        function sign_in($userName, $passWord) {
            $query_account = "SELECT * FROM login";
            $result = $this->conn->prepare($query_account);
            $result->execute();
            $accounts = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach($accounts as $account) {
                if($account['Username'] == $userName && password_verify($passWord, $account['Password'])) {
                    return 1;
                }
            }
            return 0;
        }

        function sign_up($userName, $passWord) {
            $query_account = "SELECT * FROM login";
            $result = $this->conn->prepare($query_account);
            $result->execute();
            $accounts = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach($accounts as $account) {
                if($account['Username'] == $userName) {
                    return -1;
                }
            }
            $password_encode = password_hash($passWord, PASSWORD_DEFAULT); 
            $query = "INSERT INTO login(username, password) VALUES(?,?)";
            $result = $this->conn->prepare($query);
            $result->execute([$userName,$password_encode]);
            return $result->rowCount();
        }
    }
?>