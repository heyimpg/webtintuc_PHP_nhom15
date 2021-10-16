<?php
    class home extends Controller {
        private CategoryModel $categoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index() {
            $categories = $this->categoryModel->select_array();
            $post = $this->postModel->select_array();
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/index",
                "categories" => $categories,
                "posts" => $post
            ];
            $this->view("layout", $data);
        }

        public function add() {

        }
    }
?>