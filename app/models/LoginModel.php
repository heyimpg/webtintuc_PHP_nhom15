<?php

    class LoginModel extends Database
    {
        protected String $table = "login";
        
        function sign_in($userName, $passWord) {
            $query = "SELECT * FROM login WHERE username = ? and password = ?";
            $result = $this->conn->prepare($query);
            $result->execute([$userName,$passWord]);

            return $result->rowCount();
        }

        function sign_up($userName, $passWord) {
            $query = "INSERT INTO login(username, password) VALUES(?,?)";
            $result = $this->conn->prepare($query);
            return $result->execute([$userName,$passWord]);

            return $result->rowCount();
        }
    }
?>