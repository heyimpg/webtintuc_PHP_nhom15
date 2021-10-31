<?php
    class category extends Controller {
        private CategoryModel $categoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index($ID_CTTheLoai) {
            $categories = $this->categoryModel->getAllData();
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
            //Category
            $category_post = $this->postModel->getAllDatafromMultiTable("*",[$this->postModel->getTable().".ID_CTTheLoai"=>$ID_CTTheLoai]);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/category",
                "categories" => $categories,
                "category_post" => $category_post
            ];
            $this->view("layout", $data);
        }
    }
?>