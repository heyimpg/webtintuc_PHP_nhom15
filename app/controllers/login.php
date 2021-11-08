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
            {
                if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE)
                {
                    session_start();
                }
                $_SESSION["username"]=$username;
                echo json_encode(array("statusCode"=>200));
            }
            else
                echo json_encode(array("statusCode"=>400));
        }
        public function sign_up($data_recv) {
            $data_array = explode(",", $data_recv); 
            $username = $data_array[0];
            $password = $data_array[1];
            $result = $this->login->sign_up($username, $password);
            if ($result >= 1)
                echo json_encode(array("statusCode"=>201));
            else
                echo json_encode(array("statusCode"=>400));
        }

        public function logout() {
            return session_unset();
        }
    }
?>