<?php
    class detail extends Controller {
        private AdminPostModel $postModel;

        public function __construct() {
            $this->postModel = $this->model("AdminPostModel");
        }

        public function index($ID_BaiViet) {
            $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
            //Detail
            $detail_post = $this->postModel->getDatafromMultiTable(
                $this->postModel->getTable().".ID_CTTheLoai, AnhDaiDien, TenCTTheLoai, TieuDe, GioiThieu, NoiDung",
                ["ID_BaiViet"=>$ID_BaiViet]
            );
            $category_post = $this->postModel->getAllDatafromMultiTable(
                $this->postModel->getTable().".ID_CTTheLoai, ID_BaiViet, AnhDaiDien, TenCTTheLoai, TieuDe, NgayDang",
                [$this->postModel->getTable().".ID_CTTheLoai"=>2]
            );
            $popular_post = $this->postModel->getAllData(
                "ID_BaiViet, TieuDe, NgayDang",
                ["ID_LoaiTin"=>2], "NgayDang", false);
            $this->postModel->closeConnection();
            $data = [
                "page" => "home/detail",
                "detail_post" => $detail_post,
                "category_post" => $category_post,
                "popular_post" => $popular_post
            ];
            $this->view("layout", $data);
        }
    }
?>