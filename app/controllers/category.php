<?php
    class category extends Controller {
        private CategoryModel $categoryModel;
        private AdminPostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("AdminPostModel");
        }

        public function index($ID_CTTheLoai) {
            $categories = $this->categoryModel->getAllData();
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
            //Category
            $category_post = $this->postModel->getAllDatafromMultiTable("*",[$this->postModel->getTable().".ID_CTTheLoai"=>$ID_CTTheLoai]);
            $popular_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>2],"NgayDang", false);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/subcategory",
                "categories" => $categories,
                "category_post" => $category_post,
                "popular_post" => $popular_post
            ];
            $this->view("layout", $data);
        }
    }
?>