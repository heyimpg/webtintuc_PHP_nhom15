<?php
    class category extends Controller {
        private CategoryModel $categoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->categoryModel = $this->model("CategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index($ID_CTTheLoai) {
            $categories = $this->categoryModel->getAllData("ID_CTTheLoai, TenCTTheLoai", NULL, NULL, true, 10);
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
            //Category
            $category_post_2 = $this->postModel->getAllDatafromMultiTable(
                $this->postModel->getTable().".ID_CTTheLoai, ID_BaiViet, AnhDaiDien, TenCTTheLoai, TieuDe, GioiThieu",
                [$this->postModel->getTable().".ID_CTTheLoai"=>$ID_CTTheLoai]
            );
            $popular_post = $this->postModel->getAllData(
                "ID_BaiViet, TieuDe, NgayDang",
                ["ID_LoaiTin"=>2], "NgayDang", false);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/category",
                "categories" => $categories,
                "category_post_2" => $category_post_2,
                "popular_post" => $popular_post
            ];
            $this->view("layout", $data);
        }
    }
?>