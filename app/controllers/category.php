<?php
class category extends Controller
{
    private PostModel $postModel;
    private AccountModel $accountModel;
    private LikeModel $likeModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->accountModel = $this->model("AccountModel");
        $this->likeModel = $this->model("LikeModel");
    }

    public function index($ID_TheLoai)
    {
        $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
        //Category
        //pagination
        $page_size = 2;
        $current_page = !empty($_GET["page"]) ? $_GET["page"] : 1;
        $offset = ($current_page - 1) * $page_size;
        $allRecord = $this->postModel->getAllDatafromMultiTable(
            "*",
            [$this->postModel->getTable() . ".ID_TheLoai" => $ID_TheLoai],
            null, null, null
        );
        $totalPage = ceil(sizeof($allRecord) / $page_size);
        $pagination = ["totalPage" => $totalPage, "currentPage" => $current_page];

        $category_post_2 = $this->postModel->getAllDatafromMultiTable(
            $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu, SoLuotThich, ID_TaiKhoan",
            [$this->postModel->getTable() . ".ID_TheLoai" => $ID_TheLoai],
            null,
            null,
            $page_size,
            $offset
        );

        //Popular post
        $popular_post = $this->postModel->getAllData(
            "ID_BaiViet, TieuDe, NgayDang",
            ["ID_LoaiTin" => 2],
            "NgayDang",
            false
        );

        //get Comment for per post
            //featured_post
            $this->postModel->setupSecondTable("binhluan", "ID_BaiViet");
            for ($i=0 ; $i < count($category_post_2); $i++) {
                $comment = $this->postModel->getAllDatafromMultiTable(
                    "ID_BinhLuan",
                    [$this->postModel->getTable().".ID_BaiViet" => $category_post_2[$i]['ID_BaiViet']],
                    null, null, null
                );
                $category_post_2[$i]['SoBinhLuan'] = $comment;
            }
        //get Status Like
        if(isset($_SESSION["username"])) {
            $Id_Account = $this->getIdAccount();
            for ($i=0 ; $i < count($category_post_2); $i++) {
                $like_status = $this->likeModel->getData(
                    "DaThich",
                    ["ID_TaiKhoan" => $Id_Account,
                        "ID_BaiViet" => $category_post_2[$i]['ID_BaiViet']]
                );
                $category_post_2[$i]['DaThich'] = isset($like_status['DaThich']) ? $like_status['DaThich'] : 0;
            }
        }
        //get author
        $this->postModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
        for ($i=0 ; $i < count($category_post_2); $i++) {
            $author = $this->postModel->getDatafromMultiTable(
                "TaiKhoan",
                [$this->postModel->getTable() . ".ID_TaiKhoan" => $category_post_2[$i]['ID_TaiKhoan']]
            );
            $category_post_2[$i]['TacGia'] = $author['TaiKhoan'];
        }

        $this->postModel->closeConnection();
        $data = [
            "isCategory" => true,
            "page" => "home/category",
            "category_post_2" => $category_post_2,
            "popular_post" => $popular_post,
            "pagination" => $pagination,
            "ID_TheLoai" => $ID_TheLoai
        ];
        $this->view("layout", $data);
    }

    public function subCategory($ID_CTTheLoai)
    {
        $this->postModel->setupSecondTable("chitiettheloai", "ID_CTTheLoai");
        //Sub-Category
        //pagination
        $page_size = 2;
        $current_page = !empty($_GET["page"]) ? $_GET["page"] : 1;
        $offset = ($current_page - 1) * $page_size;
        $allRecord = $this->postModel->getAllDatafromMultiTable(
            "*",
            [$this->postModel->getTable() . ".ID_CTTheLoai" => $ID_CTTheLoai],
            null, null, null
        );
        $totalPage = ceil(sizeof($allRecord) / $page_size);
        $pagination = ["totalPage" => $totalPage, "currentPage" => $current_page];

        $category_post_2 = $this->postModel->getAllDatafromMultiTable(
            $this->postModel->getTable() . ".ID_CTTheLoai, ID_BaiViet, AnhDaiDien, TenCTTheLoai, TieuDe, GioiThieu, SoLuotThich, ID_TaiKhoan",
            [$this->postModel->getTable() . ".ID_CTTheLoai" => $ID_CTTheLoai],
            null,
            null,
            $page_size,
            $offset
        );

        //Popular post
        $popular_post = $this->postModel->getAllData(
            "ID_BaiViet, TieuDe, NgayDang",
            ["ID_LoaiTin" => 2],
            "NgayDang",
            false
        );

        //get Comment for per post
            //featured_post
        $this->postModel->setupSecondTable("binhluan", "ID_BaiViet");
        for ($i=0 ; $i < count($category_post_2); $i++) {
            $comment = $this->postModel->getAllDatafromMultiTable(
                "ID_BinhLuan",
                [$this->postModel->getTable().".ID_BaiViet" => $category_post_2[$i]['ID_BaiViet']],
                null, null, null
            );
            $category_post_2[$i]['SoBinhLuan'] = $comment;
        }
        //get Status Like
        if(isset($_SESSION["username"])) {
            $Id_Account = $this->getIdAccount();
            for ($i=0 ; $i < count($category_post_2); $i++) {
                $like_status = $this->likeModel->getData(
                    "DaThich",
                    ["ID_TaiKhoan" => $Id_Account,
                        "ID_BaiViet" => $category_post_2[$i]['ID_BaiViet']]
                );
                $category_post_2[$i]['DaThich'] = isset($like_status['DaThich']) ? $like_status['DaThich'] : 0;
            }
        }

        //get author
        $this->postModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
        for ($i=0 ; $i < count($category_post_2); $i++) {
            $author = $this->postModel->getDatafromMultiTable(
                "TaiKhoan",
                [$this->postModel->getTable() . ".ID_TaiKhoan" => $category_post_2[$i]['ID_TaiKhoan']]
            );
            $category_post_2[$i]['TacGia'] = $author['TaiKhoan'];
        }

        $this->postModel->closeConnection();
        $data = [
            "isCategory" => false,
            "page" => "home/category",
            "category_post_2" => $category_post_2,
            "popular_post" => $popular_post,
            "pagination" => $pagination,
            "ID_TheLoai" => $ID_CTTheLoai
        ];
        $this->view("layout", $data);
    }

    public function searchPost()
    {
        if (isset($_REQUEST['search'])) {
            $search_value = $_REQUEST['search'];
            $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
            //pagination
            $page_size = 2;
            $current_page = !empty($_GET["page"]) ? $_GET["page"] : 1;
            $offset = ($current_page - 1) * $page_size;
            $allRecord = $this->postModel->searchPost( "*", $search_value, null );
            $totalPage = ceil(sizeof($allRecord) / $page_size);
            $pagination = ["totalPage" => $totalPage, "currentPage" => $current_page];

            $category_post_2 = $this->postModel->searchPost(
                $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu, SoLuotThich, ID_TaiKhoan",
                $search_value, 
                $page_size,
                $offset
            );
            //Popular post
            $popular_post = $this->postModel->getAllData(
                "ID_BaiViet, TieuDe, NgayDang",
                ["ID_LoaiTin" => 2],
                "NgayDang",
                false
            );

            //get Comment for per post
                //featured_post
            $this->postModel->setupSecondTable("binhluan", "ID_BaiViet");
            for ($i=0 ; $i < count($category_post_2); $i++) {
                $comment = $this->postModel->getAllDatafromMultiTable(
                    "ID_BinhLuan",
                    [$this->postModel->getTable().".ID_BaiViet" => $category_post_2[$i]['ID_BaiViet']],
                    null, null, null
                );
                $category_post_2[$i]['SoBinhLuan'] = $comment;
            }

            //get Status Like
            if(isset($_SESSION["username"])) {
                $Id_Account = $this->getIdAccount();
                for ($i=0 ; $i < count($category_post_2); $i++) {
                    $like_status = $this->likeModel->getData(
                        "DaThich",
                        ["ID_TaiKhoan" => $Id_Account,
                            "ID_BaiViet" => $category_post_2[$i]['ID_BaiViet']]
                    );
                    $category_post_2[$i]['DaThich'] = isset($like_status['DaThich']) ? $like_status['DaThich'] : 0;
                }
            }

            //get author
            $this->postModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
            for ($i=0 ; $i < count($category_post_2); $i++) {
                $author = $this->postModel->getDatafromMultiTable(
                    "TaiKhoan",
                    [$this->postModel->getTable() . ".ID_TaiKhoan" => $category_post_2[$i]['ID_TaiKhoan']]
                );
                $category_post_2[$i]['TacGia'] = $author['TaiKhoan'];
            }

            $this->postModel->closeConnection();
            $data = [
                "isCategory" => true,
                "page" => "home/category",
                "category_post_2" => $category_post_2,
                "popular_post" => $popular_post,
                "pagination" => $pagination,
                "search_value" => $search_value
            ];

            $this->view("layout", $data);
        } else {
            header("location:".BASE_URL);
        }
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
