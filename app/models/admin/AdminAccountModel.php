<?php
    class AdminAccountModel extends Database
    {
        protected String $table = "taikhoan";

        public function sign_in($userName, $passWord) {
            $row = $this->findUserByUsername($userName);
            if($row == false) { return false; }
            $hashedPassword = $row->MatKhau;
            if(password_verify($passWord, $hashedPassword)){
                return $row;
            }else{
                return false;
            }
            
        }

        public function sign_up($userName, $passWord) {
            $query = "INSERT INTO taikhoan(TenTaiKhoan, MatKhau) VALUES(?,?)";
            $result = $this->conn->prepare($query);
            if($result->execute([$userName,$passWord])) {
                return true;
            }
            else {
                return false;
            }
        }

        public function findUserByUserName($userName) {
            $query = "SELECT * FROM $this->table WHERE TenTaiKhoan = ?";
            $result = $this->conn->prepare($query);
            $result->execute([$userName]);

            if($result->rowCount() > 0) {
                return $result->fetch(PDO::FETCH_OBJ);
            }
            else {
                return false;
            }
        }


    }
?>