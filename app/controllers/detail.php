<?php
class detail extends Controller
{
    private PostModel $postModel;
    private CommentModel $commentModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->commentModel = $this->model("CommentModel");
    }

    public function index($ID_BaiViet)
    {
        $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
        //Detail
        $detail_post = $this->postModel->getDatafromMultiTable(
            $this->postModel->getTable() . ".ID_TheLoai, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu, NoiDung, ID_TaiKhoan",
            ["ID_BaiViet" => $ID_BaiViet]
        );
        $category_post = $this->postModel->getAllDatafromMultiTable(
            $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, NgayDang",
            [$this->postModel->getTable() . ".ID_TheLoai" => 2]
        );
        $popular_post = $this->postModel->getAllData(
            "ID_BaiViet, TieuDe, NgayDang",
            ["ID_LoaiTin" => 2],
            "NgayDang",
            false
        );
        //Relative-post
        $relative_post = $this->postModel->getAllDatafromMultiTable(
            $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe",
            [$this->postModel->getTable() . ".ID_TheLoai" => $detail_post['ID_TheLoai']]
        );
            //get author - ppsot detail 
        $this->postModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
        $author = $this->postModel->getDatafromMultiTable(
            "TaiKhoan",
            [$this->postModel->getTable() . ".ID_TaiKhoan" => $detail_post['ID_TaiKhoan']]
        );
        $detail_post['author'] = $author['TaiKhoan'];
        
        //Comment
        $this->commentModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
        $comment = $this->commentModel->getAllDatafromMultiTable(
            "NoiDung, TaiKhoan",
            ["ID_BaiViet" => $ID_BaiViet]
        );

        $this->postModel->closeConnection();
        $data = [
            "page" => "home/detail",
            "detail_post" => $detail_post,
            "category_post" => $category_post,
            "popular_post" => $popular_post,
            "relative_post" => $relative_post,
            "comment" => $comment
        ];
        $this->view("layout", $data);
    }
}
