<?php
    class home extends Controller {
        private PostModel $postModel;

        public function __construct() {
            $this->postModel = $this->model("PostModel");
        }

        public function index() {
            $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
            //Featured
            $featured_post = $this->postModel->getAllDatafromMultiTable(
                $this->postModel->getTable().".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu, SoLuotThich",
                ["ID_LoaiTin"=>1]
            );

            $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
            $category_post = $this->postModel->getAllDatafromMultiTable(
                $this->postModel->getTable().".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, NgayDang",
                [$this->postModel->getTable().".ID_TheLoai"=>2]
            );
            //Latest
            $latest_post = $this->postModel->getAllDatafromMultiTable(
                $this->postModel->getTable().".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, GioiThieu, SoLuotThich",
                NULL, "NgayDang",false
            );
            $popular_post = $this->postModel->getAllData(
                "ID_BaiViet, TieuDe, NgayDang",
                ["ID_LoaiTin"=>2], "NgayDang", false
            );
            //Other
            $editor_pick_post = $this->postModel->getAllData(
                "ID_BaiViet, AnhDaiDien, GioiThieu, NgayDang",["ID_LoaiTin"=>3],
                "NgayDang", false, 6
            );
            $world_post = $this->postModel->getAllData(
                "ID_BaiViet, AnhDaiDien, GioiThieu, NgayDang",["ID_LoaiTin"=>4],
                "NgayDang", false
            );

            //get Comment for per post
                //featured_post
            $this->postModel->setupSecondTable("binhluan", "ID_BaiViet");
            for ($i=0 ; $i < count($featured_post); $i++) {
                $comment = $this->postModel->getAllDatafromMultiTable(
                    "ID_BinhLuan",
                    [$this->postModel->getTable().".ID_BaiViet" => $featured_post[$i]['ID_BaiViet']],
                    null, null, null
                );
                $featured_post[$i]['SoBinhLuan'] = $comment;
            }
                //latest_post
            for ($i=0 ; $i < count($latest_post); $i++) {
                $comment = $this->postModel->getAllDatafromMultiTable(
                    "ID_BinhLuan",
                    [$this->postModel->getTable().".ID_BaiViet" => $latest_post[$i]['ID_BaiViet']],
                    null, null, null
                );
                $latest_post[$i]['SoBinhLuan'] = $comment;
            }

            $this->postModel->closeConnection();
            $data = [
                "page" => "home/index",
                "featured_post" => $featured_post,
                "category_post" => $category_post,
                "latest_post" => $latest_post,
                "popular_post" => $popular_post,
                "editor_pick_post" => $editor_pick_post,
                "world_post" => $world_post
            ];
            $this->view("layout", $data);
        }
    }
?>