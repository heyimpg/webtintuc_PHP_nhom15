<?php
class category extends Controller
{
    private PostModel $postModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
    }

    public function index($ID_TheLoai)
    {
        $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
        //Category
        $page_size = 4;
        $current_page = !empty($_GET["page"]) ? $_GET["page"] : 1;
        $offset = ($current_page - 1) * $page_size;
        $allRecord = $this->postModel->getAllDatafromMultiTable(
            "*", [$this->postModel->getTable() . ".ID_TheLoai" => $ID_TheLoai],
            null,
            null,
            9999
        );
        $totalPage = ceil(sizeof($allRecord) / $page_size);
        $pagination = ["totalPage" => $totalPage, "currentPage" => $current_page];

        $category_post_2 = $this->postModel->getAllDatafromMultiTable(
            $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu",
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
        
        $this->postModel->closeConnection();
        $data = [
            "page" => "home/category",
            "category_post_2" => $category_post_2,
            "popular_post" => $popular_post,
            "pagination" => $pagination,
            "ID_TheLoai" => $ID_TheLoai
        ];
        $this->view("layout", $data);
    }

    public function searchPost() {
        if(isset($_POST['submit_search'])) {
            $search_value = $_POST['search'];
            $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
            $category_post_2 = $this->postModel->searchPost(
                $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu",
                $search_value
            );
            //Popular post
            $popular_post = $this->postModel->getAllData(
                "ID_BaiViet, TieuDe, NgayDang",
                ["ID_LoaiTin" => 2],
                "NgayDang",
                false
            );

            $this->postModel->closeConnection();
            $data = [
                "page" => "home/category",
                "category_post_2" => $category_post_2,
                "popular_post" => $popular_post,
            ];

            $this->view("layout", $data);
            
        } else {
            header("location:".BASE_URL);
        }
    }
}
