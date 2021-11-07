<?php
    class subcategory extends Controller
    {
        private AdminSubCategoryModel $subcategory_model;
        private AdminCategoryModel $category_model;
        private String $template = "admin/subcategory";
        private String $title = "danh mục bài viết";
        private String $session = "session";
        private int $type = 1;

        public function __construct() {
            $this->subcategory_model = $this->model("AdminSubCategoryModel");
            $this->category_model = $this->model("AdminCategoryModel");
        }

        public function index() {
            $subcategories = $this->subcategory_model->getAllData("*", null, null, true, 100);
            $data = [
                "page" => "$this->template/index",
                "title" => "Danh sách $this->title",
                "template" => $this->template,
                "subcategories" => $subcategories
            ];
            $this->view("adminlayout", $data);
        }

        public function getallsubcategory() {
            $kq = $this->subcategory_model->getAllData();
            $data = [
                "page" => "$this->template/index",
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }

        public function add() {
            if (isset($_POST["submit"])) {
                $data_post = $_POST["data_post"];
                isset($data_post["Publish"]) ? $publish = 1 : $publish = 0;
                $data_post["Publish"] = $publish;
                $data_post["Type"] = $this->type;
                $data_post["NgayTao"] = gmdate("Y-m-d H:i:s", time() + 7*3600);
                $result = $this->subcategory_model->addData($data_post);
                $return = json_decode($result, true);
                if ($return["type"] == "success") {
                    $redirect = new Redirect("index");
                    $redirect->setFlash("flash", "Thêm thành công danh mục bài viết");
                }
            }
            // ID_Theloai
            $this->subcategory_model->setupSecondTable($this->category_model->getTable(), "ID_TheLoai");
            $categories = $this->subcategory_model->getAllDatafromMultiTable("chitiettheloai.ID_TheLoai, TenTheLoai", null, null, null, 100);
            $data = [
                "page" => "$this->template/add",
                "title" => "Thêm mới $this->title",
                "template" => $this->template,
                "categories" => $categories
            ];
            $this->view("adminlayout", $data);
        }
    }

?>