<?php
    class AdminAccountModel extends Database
    {
        protected String $table = "taikhoan";

        public function sign_in($userName, $passWord) {
            $row = $this->findUserByUsername($userName);
            // Tài khoản chưa tồn tại trong hệ thống
            $hashedPassword = $row->MatKhau;
            $role = $row->ID_ChucDanh;
            if($row == false) { return -1; }
            // Sai mật khẩu
            else if(!password_verify($passWord, $hashedPassword)){    
                return -2;
            }
            // Không phải chức danh quản trị viên
            else if($role != 1) {
                return -3;
            }
            else {
                return $row;
            }
        }

        public function sign_up($userName, $passWord) {
            $query = "INSERT INTO taikhoan(TaiKhoan, MatKhau, ID_ChucDanh) VALUES(?,?,?)";
            $result = $this->conn->prepare($query);
            // Đăng kí tài khoản với quyền người dùng
            if($result->execute([$userName,$passWord,2])) {
                return true;
            }
            else {
                return false;
            }
        }

        public function findUserByUserName($userName) {
            $query = "SELECT * FROM $this->table WHERE TaiKhoan = ?";
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