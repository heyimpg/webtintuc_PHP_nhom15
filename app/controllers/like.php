<?php
    class like extends Controller {
        private LikeModel $likeModel;
        private AccountModel $accountModel;
        private PostModel $postModel;

        public function __construct() {
            $this->likeModel = $this->model("LikeModel");
            $this->accountModel = $this->model("AccountModel");
            $this->postModel = $this->model("PostModel");
        }

        public function changeStatus($data_recv) {
            $data_array = explode(",", $data_recv); 
            $username = $data_array[0];
            $ID_BaiViet = $data_array[1];
            //kiểm tra trạng thái
            //đã thích -> thay đổi thành k thích, giảm số lượng like
            $Id_Account = $this->getIdAccount($username);
            if($Id_Account != -1) {
                $result = $this->likeModel->getData(
                    "DaThich",
                    ["ID_TaiKhoan" => $Id_Account,
                        "ID_BaiViet" => $ID_BaiViet]
                );
                if($result) {
                    $quantity_like = $this->postModel->getData("SoLuotThich", ["ID_BaiViet"=>$ID_BaiViet]);
                    $quantity_like_number = intval($quantity_like['SoLuotThich']);

                    if($result['DaThich']) //nếu đã thích (==1)
                    {
                        $quantity_like_number--;
                        $this->likeModel->updateData(
                            ["DaThich" => 0],
                            [$this->likeModel->getTable().".ID_TaiKhoan" => $Id_Account,
                             "ID_BaiViet" => $ID_BaiViet]
                        );
                        
                    }
                    else {
                        $quantity_like_number++;
                        $this->likeModel->updateData(
                            ["DaThich" => 1],
                            [$this->likeModel->getTable().".ID_TaiKhoan" => $Id_Account,
                             "ID_BaiViet" => $ID_BaiViet]
                        );
                    }
                    $this->postModel->updateData(
                        ["SoLuotThich" => $quantity_like_number],
                        ["ID_BaiViet"=>$ID_BaiViet]
                    );   
                    echo json_encode(array("statusCode"=>200));
                } else {
                    echo json_encode(array("statusCode"=>404));
                    //TH sẽ k xảy ra, nếu có thì do trong csdl chưa chèn data -> sai từ getStatus
                }
            } else {
                header("location:".BASE_URL);
            }

        } 

        public function getStatus($data_recv) {
            $data_array = explode(",", $data_recv); 
            $username = $data_array[0];
            $ID_BaiViet = $data_array[1];
            
            //kiểm tra xem tài khoản này đã từng like hay chưa? (đã từng tồn tại trong csdl)
            //nếu chưa thì thêm vào csdl kèm stt = 0
            //nếu rồi thì lấy ra stt
            $this->likeModel->setupSecondTable("taikhoan", "ID_TaiKhoan");
            $Id_Account = $this->getIdAccount($username);
            if($Id_Account != -1) {
                $result = $this->likeModel->getDatafromMultiTable(
                    "DaThich",
                    [$this->likeModel->getTable().".ID_TaiKhoan" => $Id_Account,
                        "ID_BaiViet" => $ID_BaiViet]
                );
                if($result) {
                    if($result['DaThich']) //nếu đã thích (==1)
                        echo json_encode(array("statusCode"=>201));
                    else
                        echo json_encode(array("statusCode"=>204));
                } else {
                    //nếu tài khoản chưa tồn tại <c-result = 0> -> thêm vào csdl với stt = 0
                    $this->likeModel->addData([
                        "ID_BaiViet" => $ID_BaiViet,
                        "ID_TaiKhoan" => $Id_Account,
                        "DaThich" => 0,
                    ]);
                    echo json_encode(array("statusCode"=>204));
                }
            } else {
                header("location:".BASE_URL);
            }
        }

        public function getIdAccount($username) {
            if(isset($_SESSION["username"])) {
                $account = $this->accountModel->getData("ID_TaiKhoan", ["TaiKhoan"=>$username]);
                return $account["ID_TaiKhoan"];
            } else {
                return -1;
            }
        }


    }
?>