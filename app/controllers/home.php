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
            $featured_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>1]);
            $category_post = $this->postModel->getAllData("*",["ID_CTTheLoai"=>1]);
            $latest_post = $this->postModel->getAllData("*",NULL, "NgayDang",false);
            $popular_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>2],"NgayDang", false);
            $side_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>3], "NgayDang", false, 6);
            $world_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>4], "NgayDang", false);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/index",
                "categories" => $categories,
                "featured_post" => $featured_post,
                "category_post" => $category_post,
                "latest_post" => $latest_post,
                "popular_post" => $popular_post,
                "side_post" => $side_post,
                "world_post" => $world_post
            ];
            $this->view("layout", $data);
        }

        public function add() {

        }
    }
?>