<?php
    class login extends Controller {
        private LoginModel $login;

        public function __construct() {
            $this->login = $this->model("LoginModel");
        }

        public function sign_in($data_recv) {
            $data_array = explode(",", $data_recv); 
            $username = $data_array[0];
            $password = $data_array[1];
            $result = $this->login->sign_in($username, $password);
            if ($result >= 1)
                echo 'Successfully!!!';
            else
                echo '--Failure--';
        }
    }
?>