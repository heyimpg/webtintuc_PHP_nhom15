<?php
    class category extends Controller {
        private CategoryModel $category_model;
        private String $template = "category";

        public function __construct() {
            $this->category_model = $this->model("CategoryModel");
        }

        public function index() {
            $kq = $this->category_model->getAllData();
            $data = [
                "page" => "{$this->template}/index",
                "categories" => $kq
            ];
            $this->view("layout", $data);
        }

        public function add() {}

        public function demo() {}
    }