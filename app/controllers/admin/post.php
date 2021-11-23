<?php
    class post extends Controller {
        private String $template = "admin/post";

        public function index() {
            $data = array(
                "page" => "$this->template/index"
            );
            $this->view("adminlayout", $data);
        }

        public function add() {
            if(isset($_POST["submit"])) {
                $file_name = $this->validate_upload_file();
            }
            $data = array(
                "page" => "$this->template/add"
            );
            $this->view("adminlayout", $data);
        }

        public function validate_upload_file() {
            $flag = true;
            // Kiểm tra xem file có thật sự là file ảnh hay không
            $check = getimagesize($_FILES["upload_file"]["tmp_name"]);
            if($check === false) {
                echo "File không phải là file ảnh";
                $flag = false;
            } else {
                echo "File là file ảnh - " . $check["mime"] . ".";
            }
            // Kiểm tra xem file đã có hay chưa
            $file_path = UPLOAD_FOLDER_PATH.basename($_FILES["upload_file"]["name"]);
            if(file_exists($file_path)) {
                echo "File đã tồn tại";
                $flag = false;
            }
            // Kiểm tra phần mở rộng của file
            $ext = array("jpg", "png", "jpeg");
            $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if(!in_array($file_type, $ext)) {
                echo "Loại file không hợp lệ";
                $flag = false;
            }
            // Kiểm tra dung lượng file
            if($_FILES["upload_file"]["size"] > 500000) {
                echo "Dung lượng file quá lớn";
                $flag = false;
            }
            if($flag) {
                move_uploaded_file($_FILES["upload_file"]["tmp_name"], $file_path);
                return basename($_FILES["upload_file"]["name"]);
            }
            else {
                echo "Không thể upload file";
            }
        }
    }
?>