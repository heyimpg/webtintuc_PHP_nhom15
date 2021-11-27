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
        public function sendEmail($data_recv) {
            $data_array = explode(",", $data_recv); 
            $name = $data_array[0];
            $phone = $data_array[1];
            $email = $data_array[2];
            if(!strlen($name) || strlen($phone) != 10 || strlen($email) < 10)
                echo json_encode(array("statusCode"=>400));
            else
                {
                    $to = EMAIL_UNAME;
                    $subject = "webtintuc - Thư liên hệ hợp tác";
                    // $message = "Tên: <span style='color: red'>$name</span> <br/>SĐT: $phone <br/>Email: $email";
                    $message = "<div class='main' 
                            style='background-color: rgba(173, 139, 139, 0.2); text-align: center; padding: 10px'
                        >
                            <table
                                style='border-spacing:0;border-collapse:collapse;padding:0;vertical-align:top;width:100%;'
                                width='100%' valign='top'>
                                <tbody>
                                    <tr style='padding:0;vertical-align:top;text-align:left' valign='top' align='left'>
                                        <td style='word-break:break-word;vertical-align:top;color:#172b4d;font-weight:normal;padding:0;margin:0;text-align:left;font-size:14px;line-height:19px;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Noto Sans,Ubuntu,Droid Sans,Helvetica Neue,sans-serif;border-collapse:collapse'
                                            valign='top' align='left'>
                                            <div style='display:block;margin:0 auto;padding:12px 16px; text-align: center'>
                                                <img height='50' width='100'
                                                    src='https://cdn.icon-icons.com/icons2/1675/PNG/512/3890941-market-news-newspaper-stock_111181.png'
                                                    alt='' style='display: unset; background-size: contain;'
                                                    >
                                                <h2 style='display: unset; font-family: monospace;'>Web tin tức</h2>
                                            </div>
            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style='border-spacing:0;border-collapse:collapse;padding:0;vertical-align:top;width:100%;'
                            >
                                <div class='box' style='width: 300px; height: 200px; background-color:white; margin: 0 auto; padding: 5px; text-align: left; border-radius: 5px;'>
                                    <ul style='padding: 0'>
                                        <li style='list-style: none; line-height: 30px; font-size: larger; text-align: center; font-family: cursive;'>Thông tin đối tác</li>
                                        <li style='list-style: none; line-height: 30px; font-size: larger; font-family: -webkit-pictograph;'>Tên: $name</li>
                                        <li style='list-style: none; line-height: 30px; font-size: larger; font-family: -webkit-pictograph;'>SĐT: $phone</li>
                                        <li style='list-style: none; line-height: 30px; font-size: larger; font-family: -webkit-pictograph;'>Email: $email</li>
                                    </ul>
                                </div>
                            </div>
                        </div>";

                    $header = "From: abc@gmail.com \r\n";
                    $header .= "Content-type: text/html; charset=utf-8";
                    if(mail($to, $subject, $message, $header))
                        echo json_encode(array("statusCode"=>200));
                    else
                        echo json_encode(array("statusCode"=>400));
                }
        }
    }
