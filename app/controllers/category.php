<?php
    class category extends Controller {
        private CategoryModel $category_model;
        private String $template = "category";

        public function __construct() {
            $this->category_model = $this->model("CategoryModel");
        }

        public function index() {
            $kq = $this->category_model->select_array();
            $data = [
                "page" => "{$this->template}/index",
                "array" => $kq
            ];
            $this->view("layout", $data);
        }
    }