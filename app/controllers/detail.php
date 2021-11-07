<?php
    class detail extends Controller {
        private CategoryModel $categoryModel;
        private AdminPostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("AdminPostModel");
        }

        public function index($ID_BaiViet) {
            $categories = $this->categoryModel->getAllData();
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
            //Detail
            $detail_post = $this->postModel->getDatafromMultiTable("*",["ID_BaiViet"=>$ID_BaiViet]);
            $category_post = $this->postModel->getAllDatafromMultiTable("*",[$this->postModel->getTable().".ID_CTTheLoai"=>2]);
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