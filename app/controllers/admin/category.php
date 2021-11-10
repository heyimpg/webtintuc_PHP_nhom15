<?php
    class category extends Controller
    {
        private AdminSubCategoryModel $subcategory_model;
        private AdminCategoryModel $category_model;
        private String $template = "admin/category";
        private String $title = "danh mục bài viết";
        private String $session = "session";
        private int $type = 1;

        public function __construct() {
            $this->subcategory_model = $this->model("AdminSubCategoryModel");
            $this->category_model = $this->model("AdminCategoryModel");
        }

        public function index() {
            $categoriesQuery = $this->category_model->queryGetData("select theloai.TenTheLoai, chitiettheloai.TenCTTheLoai, chitiettheloai.NgayTao, theloai.NgayKhoiTao, theloai.HienThiCha, chitiettheloai.HienThiCon from chitiettheloai right join theloai on chitiettheloai.ID_TheLoai = theloai.ID_TheLoai", null, null, true, 100);
            $categories = $this->category_model->executeQuery($categoriesQuery);
            $data = [
                "page" => "$this->template/index",
                "title" => "Danh sách $this->title",
                "template" => $this->template,
                "categories" => $categories
            ];
            $this->view("adminlayout", $data);
        }

        public function add() {
            if (isset($_POST["submit"])) {
                $data_post = $_POST["data_post"];
                isset($data_post["HienThi"]) ? $publish = 1 : $publish = 0;
                unset($data_post["HienThi"]);
                if(isset($data_post["ID_TheLoai"])) {
                    $data_post["Type"] = $this->type;
                    $data_post["HienThiCon"] = $publish;
                    $data_post["NgayTao"] = gmdate("Y-m-d H:i:s", time() + 7*3600);
                    $result = $this->subcategory_model->addData($data_post);
                }
                else {
                    $data_post["TenTheLoai"] = $data_post["TenCTTheLoai"];
                    unset($data_post["TenCTTheLoai"]);
                    unset($data_post["URL"]);
                    $data_post["HienThiCha"] = $publish;
                    $data_post["NgayKhoiTao"] = gmdate("Y-m-d H:i:s", time() + 7*3600);
                    $result = $this->category_model->addData($data_post);
                }
                $return = json_decode($result, true);
                if ($return["type"] == "success") {
                    $redirect = new Redirect("index");
                    $redirect->setFlash("flash", "Thêm thành công danh mục bài viết");
                }
            }
            // ID_Theloai
            // $this->subcategory_model->setupSecondTable($this->category_model->getTable(), "ID_TheLoai");
            // $categories = $this->subcategory_model->getAllDatafromMultiTable("chitiettheloai.ID_TheLoai, TenTheLoai", null, null, true, 100);
            $categoriesQuery = $this->category_model->queryGetData("select theloai.TenTheLoai, theloai.ID_Theloai from chitiettheloai right join theloai on chitiettheloai.ID_TheLoai = theloai.ID_TheLoai", null, null, true, 100);
            $categories = $this->category_model->executeQuery($categoriesQuery);
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