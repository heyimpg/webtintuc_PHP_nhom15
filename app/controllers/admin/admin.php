<?php

    class admin extends Controller
    {
        private Redirect $redirect;
        public function __construct() {
            $this->redirect = new Redirect();
        }

        public function index() {
            $signup_alert = $this->redirect->flash('dang-ki');
            $data = array(
                'signup_alert' => $signup_alert
            );
            $this->view("pages/admin/index", $data);
        }

        public function signin() {
            if(isset($_POST["submit"])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if($_POST["type"] == "dang-nhap") {
                    $data = array(
                        "TenTaiKhoan" => trim($_POST["TenTaiKhoan"]),
                        "MatKhau" => trim($_POST["MatKhau"])
                    );
                }
                exit();
            }
        }

        public function signup() {
            if(isset($_POST["submit"])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if($_POST["type"] == "dang-ki") {
                    $data = array(
                        "TenTaiKhoan" => trim($_POST["TenTaiKhoan"]),
                        "Email" => trim($_POST["Email"]),
                        "MatKhau" => trim($_POST["MatKhau"]),
                        "XacNhanMatKhau" => trim($_POST["XacNhanMatKhau"]),
                    );
                    if(empty($data["TenTaiKhoan"]) || empty($data["Email"]) || empty($data["MatKhau"]) || empty($data["XacNhanMatKhau"]) ) {
                        $this->redirect->flash("dang-ki", "Hãy điền đầy đủ thông tin");
                        $this->redirect->redirect(BASE_URL."admin/#signup");
                        exit();
                    }
                }
            }
        }
    }
?>