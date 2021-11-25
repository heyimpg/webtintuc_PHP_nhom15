<?php
    class home extends Controller {
        private PostModel $postModel;
        private AccountModel $accountModel;
        private LikeModel $likeModel;

        public function __construct() {
            $this->postModel = $this->model("PostModel");
            $this->accountModel = $this->model("AccountModel");
            $this->likeModel = $this->model("LikeModel");
        }

        public function index() {
            $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
            //Featured
            $featured_post = $this->postModel->getAllDatafromMultiTable(
                $this->postModel->getTable().".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu, SoLuotThich",
                ["ID_LoaiTin"=>1]
            );
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

            //get number Comment for per post
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

            //get Status Like
            if(isset($_SESSION["username"])) {
                $Id_Account = $this->getIdAccount();
                for ($i=0 ; $i < count($featured_post); $i++) {
                    $like_status = $this->likeModel->getData(
                        "DaThich",
                        ["ID_TaiKhoan" => $Id_Account,
                            "ID_BaiViet" => $featured_post[$i]['ID_BaiViet']]
                    );
                    $featured_post[$i]['DaThich'] = isset($like_status['DaThich']) ? $like_status['DaThich'] : 0;
                }

                for ($i=0 ; $i < count($latest_post); $i++) {
                    $like_status = $this->likeModel->getData(
                        "DaThich",
                        ["ID_TaiKhoan" => $Id_Account,
                            "ID_BaiViet" => $latest_post[$i]['ID_BaiViet']]
                    );
                    $latest_post[$i]['DaThich'] = isset($like_status['DaThich']) ? $like_status['DaThich'] : 0;
                }
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

        public function getIdAccount() {
            if(isset($_SESSION["username"])) {
                $username = $_SESSION["username"];
                $account = $this->accountModel->getData("ID_TaiKhoan", ["TaiKhoan"=>$username]);
                return $account["ID_TaiKhoan"];
            } else {
                return -1;
            }
        }
    }
?>