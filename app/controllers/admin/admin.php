<?php

    class admin extends Controller
    {
        private PostModel $post_model;

        public function __construct() {
            $this->post_model = $this->model("PostModel");
        }

        public function index() {
            $kq = $this->post_model->select_array();
            $data = [
                "page" => "admin/index",
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }
    }
?>