<?php

    class post extends Controller {
        private AdminCategoryModel $category_model;
        private AdminLoaiTinModel $loaitin_model;
        private AdminPostModel $post_model;
        private String $template = "admin/post";

        public function __construct() {
            $this->category_model = $this->model("AdminCategoryModel");
            $this->loaitin_model = $this->model("AdminLoaiTinModel");
            $this->post_model = $this->model("AdminPostModel");
        }

        public function index() {
            $data = array(
                "page" => "$this->template/index"
            );
            $this->view("adminlayout", $data);
        }

        public function add() {
            $categories = $this->category_model->getAllData("theloai.ID_TheLoai, theloai.TenTheLoai", null, null, true, 10);
            $loaitintuc = $this->loaitin_model->getAllData("loaitin.ID_LoaiTin, loaitin.TenLoaiTin", null, null, true, 10);
            $data = array(
                "page" => "$this->template/add",
                "categories" => $categories,
                "loaitin" => $loaitintuc
            );
            
            if(isset($_POST["submit"])) {
                $post_title = $_POST["post_title"];
                $post_short_content = $_POST["post_short_content"];
                $file_name = $this->validate_upload_file();
                $post_content = $_POST["post_content"];
                $theloai = filter_input(INPUT_POST, 'theloai', FILTER_SANITIZE_STRING);
                $loaitin = filter_input(INPUT_POST, 'loaitin', FILTER_SANITIZE_STRING);
                // Kiểm tra các trường xem có rỗng hay không
                if (!empty($post_title) && !empty($post_short_content) && !empty($file_name) && !empty($post_content) && !empty($theloai) && !empty($loaitin) && !strpos($file_name, 'Không thể')) {
                    $data_post = array(
                        "TieuDe" => $post_title,
                        "GioiThieu" => $post_short_content,
                        "AnhDaiDien" => $file_name,
                        "NoiDung" => $post_content,
                        "ID_TheLoai" => $theloai,
                        "ID_LoaiTin" => $loaitin
                    );
                    $this->post_model->addData($data_post);
                    $data["message"] = "Thêm bài viết thành công";
                }
                else {
                    $data["message"] = "Bạn chưa điền đầy đủ thông tin bài viết hoặc $file_name";
                }
            }
            $this->view("adminlayout", $data);
        }

        public function validate_upload_file() {
            $flag = true;
            $err_message = "";
            // Kiểm tra xem file có thật sự là file ảnh hay không
            $check = getimagesize($_FILES["upload_file"]["tmp_name"]);
            if($check === false) {
                $err_message .= "Tệp tin bạn tải lên không phải là hình ảnh";
                $flag = false;
            } else {
                // echo "File là file ảnh - " . $check["mime"] . ".";
            }
            // Kiểm tra xem file đã có hay chưa
            $file_path = UPLOAD_FOLDER_PATH.basename($_FILES["upload_file"]["name"]);
            if(file_exists($file_path)) {
                $err_message .= "Ảnh đại diện đã tồn tại";
                $flag = false;
            }
            // Kiểm tra phần mở rộng của file
            $ext = array("jpg", "png", "jpeg");
            $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if(!in_array($file_type, $ext)) {
                $err_message .= "Ảnh đại diện phải có định dạng JPG, PNG, JPEG ";
                $flag = false;
            }
            // Kiểm tra dung lượng file
            if($_FILES["upload_file"]["size"] > 500000) {
                $err_message .= "Dung lượng ảnh quá lớn";
                $flag = false;
            }
            if($flag) {
                move_uploaded_file($_FILES["upload_file"]["tmp_name"], $file_path);
                return basename($_FILES["upload_file"]["name"]);
            }
            else {
                $err_message .= ", không thể tải lên ảnh đại diện.";
                return $err_message;
            }
        }

        public function test() {
            $result = $this->post_model->postList();
            echo $result;
        }
    }
?>