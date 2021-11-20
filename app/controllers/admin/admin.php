<?php

    class admin extends Controller
    {
        private AdminPostModel $admin_post_model;

        public function __construct() {
            $this->admin_post_model = $this->model("AdminPostModel");
        }

        public function index() {
            $kq = $this->admin_post_model->getAllData();
            $this->view("pages/admin/index");
        }

        public function signin() {
            if(isset($_POST["submit"])) {
                var_dump($_POST);
                exit();
            }
        }

        public function signup() {
            if(isset($_POST["submit"])) {
                var_dump($_POST);
                exit();
            }
        }
    }
?>