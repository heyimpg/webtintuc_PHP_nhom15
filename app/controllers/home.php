<?php
    class home extends Controller {
        private CategoryModel $categoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index() {
            $categories = $this->categoryModel->getAllData();
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
             //Featured
            $featured_post = $this->postModel->getAllDatafromMultiTable("*",["ID_LoaiTin"=>1]);
            $category_post = $this->postModel->getAllDatafromMultiTable("*",[$this->postModel->getTable().".ID_CTTheLoai"=>2]);

            $this->postModel->closeConnection();
            $data = [
                "page" => "home/index",
                "categories" => $categories,
                "featured_post" => $featured_post,
                "category_post" => $category_post
            ];
            $this->view("layout", $data);
        }
    }
?>