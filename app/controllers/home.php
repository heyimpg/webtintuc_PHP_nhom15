<?php
    class home extends Controller {
        private SubCategoryModel $subCategoryModel;
        private PostModel $postModel;

        public function __construct() {
            $this->subCategoryModel = $this->model("SubCategoryModel");
            $this->postModel = $this->model("PostModel");
        }

        public function index() {
            $categories = $this->subCategoryModel->getAllData();
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
            //Featured
            $featured_post = $this->postModel->getAllDatafromMultiTable("*",["ID_LoaiTin"=>1]);
            $category_post = $this->postModel->getAllDatafromMultiTable("*",[$this->postModel->getTable().".ID_CTTheLoai"=>2]);
            //Latest
            $latest_post = $this->postModel->getAllDatafromMultiTable("*",NULL, "NgayDang",false);
            // $latest_post = $this->postModel->getAllData("*",NULL, "NgayDang",false);
            $popular_post = $this->postModel->getAllData("*",["ID_LoaiTin"=>2],"NgayDang", false);
            //Other
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
    }
?>