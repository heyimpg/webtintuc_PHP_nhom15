<?php

    class category extends Controller
    {
        private CategoryModel $category_model;

        public function __construct() {
            $this->category_model = $this->model("CategoryModel");
        }

        public function index() {
            $kq = $this->category_model->select_array();
            $data = [
                "page" => "admin/index",
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }

        public function getallcategory() {
            $kq = $this->category_model->select_array();
            $data = [
                "page" => "admin/index",
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }
    }

?>