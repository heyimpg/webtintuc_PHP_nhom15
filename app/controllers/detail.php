<?php
class detail extends Controller
{
    private PostModel $postModel;
    private CommentModel $commentModel;
    private AccountModel $accountModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->commentModel = $this->model("CommentModel");
        $this->accountModel = $this->model("AccountModel");
    }

    public function index($ID_BaiViet)
    {
        $this->postModel->setupSecondTable("theloai", "ID_TheLoai");
        //Detail
        $detail_post = $this->postModel->getDatafromMultiTable(
            $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, GioiThieu, NoiDung, ID_TaiKhoan, SoLuotThich",
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
            $this->postModel->getTable() . ".ID_TheLoai, ID_BaiViet, AnhDaiDien, TenTheLoai, TieuDe, SoLuotThich",
            [$this->postModel->getTable() . ".ID_TheLoai" => $detail_post['ID_TheLoai']]
        );
        
        
        //get author - post detail 
        $this->postModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
        $author = $this->postModel->getDatafromMultiTable(
            "TaiKhoan",
            [$this->postModel->getTable() . ".ID_TaiKhoan" => $detail_post['ID_TaiKhoan']]
        );
        $detail_post['author'] = $author['TaiKhoan'];
        //add new comment
        if(isset($_POST['submit_comment'])) {
            $content = $_POST['content'];
            $username = $_SESSION['username'];
            $account =  $this->accountModel->getData("ID_TaiKhoan", ["TaiKhoan"=>$username]);
            $this->commentModel->addData([
                "NoiDung"=>$content, 
                "ID_BaiViet"=>$ID_BaiViet, 
                "ID_TaiKhoan"=>$account["ID_TaiKhoan"] 
            ]);
        }
        //getAll Comment
        $this->commentModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
        $comments = $this->commentModel->getAllDatafromMultiTable(
            "NoiDung, ThoiGianBinhLuan, TaiKhoan",
            ["ID_BaiViet" => $ID_BaiViet],
            null, null, null
        );
            //get number Comment
        $this->postModel->setupSecondTable("binhluan", "ID_BaiViet");
        for ($i=0 ; $i < count($relative_post); $i++) {
            $comment = $this->postModel->getAllDatafromMultiTable(
                "ID_BinhLuan",
                [$this->postModel->getTable().".ID_BaiViet" => $relative_post[$i]['ID_BaiViet']],
                null, null, null
            );
            $relative_post[$i]['SoBinhLuan'] = $comment;
        }

        $this->postModel->closeConnection();
        $this->commentModel->closeConnection();
        $this->accountModel->closeConnection();
        $data = [
            "page" => "home/detail",
            "detail_post" => $detail_post,
            "category_post" => $category_post,
            "popular_post" => $popular_post,
            "relative_post" => $relative_post,
            "comments" => $comments
        ];
        $this->view("layout", $data);
    }
}
