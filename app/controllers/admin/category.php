<?php

    class category extends Controller
    {
        private CategoryModel $category_model;
        private String $template = "admin/category";
        private String $title = "danh mục bài viết";

        public function __construct() {
            $this->category_model = $this->model("CategoryModel");
        }

        public function index() {
            $categories = $this->category_model->getAllData();
            $data = [
                "page" => "$this->template/index",
                "title" => "Danh sách $this->title",
                "template" => $this->template,
                "categories" => $categories
            ];
            $this->view("adminlayout", $data);
        }

        public function getallcategory() {
            $kq = $this->category_model->getAllData();
            $data = [
                "page" => "$this->template/index",
                "array" => $kq
            ];
            $this->view("adminlayout", $data);
        }

        public function add() {
            if (isset($_POST["submit"])) {
                $data_post = $_POST["data_post"];
                $data_post["Publish"] ? $publish = 1 : $publish = 0;
                $data_post["Publish"] = $publish;
                $result = $this->category_model->addData($data_post);
                $return = json_decode($result, true);
                if ($return["type"] == "success") {
                    header("location: $this->template/index");
                }
            }
            $data = [
                "page" => "$this->template/add",
                "title" => "Thêm mới $this->title",
                "template" => $this->template
            ];
            $this->view("adminlayout", $data);
        }
    }

?>