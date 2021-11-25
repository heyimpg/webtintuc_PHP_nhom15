<?php

    class home extends Controller
    {
        private Redirect $redirect;
        private AdminAccountModel $account;
        private String $template = "admin/home";
        
        public function __construct() {
            $this->account = $this->model("AdminAccountModel");
            $this->redirect = new Redirect();
        }

        public function index() {
            if(!isset($_SESSION['loggedIn'])) {
                $this->view("pages/admin/index");
            }
            else {
                $this->welcome();
            }
        }

        public function welcome() {
            $data = array(
                "page" => "$this->template/welcome"
            );
            $this->view("adminlayout", $data);
        }

        public function signin() {
            if(isset($_POST["submit"])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if($_POST["type"] == "dang-nhap") {
                    $data = array(
                        "TenTaiKhoan_DN" => trim($_POST["TenTaiKhoan_DN"]),
                        "MatKhau_DN" => trim($_POST["MatKhau_DN"])
                    );
                    if(empty($data["TenTaiKhoan_DN"]) || empty($data["MatKhau_DN"]) ) {
                        $this->redirect->flash("dang-nhap", "Tên và mật khẩu không được để trống");
                        $this->redirect->redirect(BASE_URL."admin/#signin");
                        exit();
                    }
                    if($this->account->findUserByUserName($data["TenTaiKhoan_DN"])) {
                        $loggedInUser = $this->account->sign_in($data["TenTaiKhoan_DN"], $data["MatKhau_DN"]);
                        if($loggedInUser) {
                            $this->createUserSession($loggedInUser);
                        } else {
                            $this->redirect->flash("dang-nhap", "Mật khẩu không chính xác");
                            $this->redirect->redirect(BASE_URL."admin/#signin");
                        }
                    }
                    else {
                        $this->redirect->flash("dang-nhap", "Tài khoản không tồn tại");
                        $this->redirect->redirect(BASE_URL."admin/#signin");
                    }
                }
                exit();
            }
        }

        public function signup() {
            if(isset($_POST["submit"])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if($_POST["type"] == "dang-ki") {
                    $data = array(
                        "TenTaiKhoan_DK" => trim($_POST["TenTaiKhoan_DK"]),
                        "MatKhau_DK" => trim($_POST["MatKhau_DK"]),
                        "XacNhanMatKhau_DK" => trim($_POST["XacNhanMatKhau_DK"])
                    );
                    if(empty($data["TenTaiKhoan_DK"]) || empty($data["MatKhau_DK"]) || empty($data["XacNhanMatKhau_DK"]) ) {
                        $this->redirect->flash("dang-ki", "Hãy điền đầy đủ thông tin");
                        $this->redirect->redirect(BASE_URL."admin/#signup");
                        exit();
                    }
                    if(strlen($data["MatKhau_DK"]) < 6){
                        $this->redirect->flash("dang-ki", "Mật khẩu phải có độ dài hơn 6 kí tự");
                        $this->redirect->redirect(BASE_URL."admin/#signup");
                    } 
                    if($data["MatKhau_DK"] !== $data["XacNhanMatKhau_DK"]){
                        $this->redirect->flash("dang-ki", "Mật khẩu xác nhận không khớp");
                        $this->redirect->redirect(BASE_URL."admin/#signup");
                    }

                    if($this->account->findUserByUserName($data["TenTaiKhoan_DK"])) {
                        $this->redirect->flash("dang-ki", "Người dùng đã tồn tại");
                        $this->redirect->redirect(BASE_URL."admin/#signup");
                    }

                    $data["MatKhau_DK"] = password_hash($data["MatKhau_DK"], PASSWORD_DEFAULT);

                    if($this->account->sign_up($data["TenTaiKhoan_DK"], $data["MatKhau_DK"])) {
                        $this->redirect->redirect(BASE_URL."admin/#signin");
                    }
                    else {
                        exit("Đã xảy ra sự cố");
                    }
                }
            }
        }

        public function createUserSession($user){
            $_SESSION['ID_TaiKhoan'] = $user->ID_TaiKhoan;
            $_SESSION['TaiKhoan'] = $user->TaiKhoan;
            $_SESSION['MatKhau'] = $user->MatKhau;
            $_SESSION["loggedIn"] = true;
            $this->redirect->redirect(BASE_URL."admin/home/welcome");
        }
    
        public function signout(){
            unset($_SESSION['ID_TaiKhoan']);
            unset($_SESSION['TaiKhoan']);
            unset($_SESSION['MatKhau']);
            unset($_SESSION['loggedIn']);
            session_destroy();
            $this->redirect->redirect(BASE_URL."admin/#signin");
        }
    }
?>