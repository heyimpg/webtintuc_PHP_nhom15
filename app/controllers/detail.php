<?php
    class detail extends Controller {
        private CategoryModel $categoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index($ID_BaiViet) {
            $categories = $this->categoryModel->getAllData();
            $detail_post = $this->postModel->getData("*",["ID_BaiViet"=>$ID_BaiViet]);
            $category_post = $this->postModel->getAllData("*",["ID_CTTheLoai"=>1]);
            $popular_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>2],"NgayDang", false);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/detail",
                "categories" => $categories,
                "detail_post" => $detail_post,
                "category_post" => $category_post,
                "popular_post" => $popular_post
            ];
            $this->view("layout", $data);
        }
    }
?>