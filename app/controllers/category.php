<?php
    class category extends Controller {
        private CategoryModel $categoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index($ID_TheLoai) {
            $categories = $this->categoryModel->getAllData();
            $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
            //Category
            $category_post = $this->postModel->getAllDatafromMultiTable("*",[$this->postModel->getTable().".ID_TheLoai"=>$ID_TheLoai]);
            $popular_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>2],"NgayDang", false);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/category",
                "categories" => $categories,
                "category_post" => $category_post,
                "popular_post" => $popular_post
            ];
            $this->view("layout", $data);
        }
    }
?>