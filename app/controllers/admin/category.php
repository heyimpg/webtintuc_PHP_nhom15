<?php

    class category extends Controller
    {
        private CategoryModel $category_model;
        private String $template = "admin/category";
        private String $title = "danh mục sản phẩm";

        public function __construct() {
            $this->category_model = $this->model("CategoryModel");
        }

        public function index() {
            $kq = $this->category_model->select_row();
            $data = [
                "page" => "$this->template/index",
                "title" => "Thêm mới $this->title",
                "template" => $this->template,
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }

        public function getallcategory() {
            $kq = $this->category_model->select_array();
            $data = [
                "page" => "$this->template/index",
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }

        public function add() {
            $data = [
                "page" => "$this->template/add",
            ];
            $this->view("adminlayout", $data);
        }
    }

?>