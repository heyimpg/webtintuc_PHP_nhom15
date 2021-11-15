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
            $categories = $this->category_model->executeIndexQuery();
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
            // ID_TheLoai
            $categories = $this->category_model->executeAddQuery();
            $data = [
                "page" => "$this->template/add",
                "title" => "Thêm mới $this->title",
                "template" => $this->template,
                "categories" => $categories
            ];
            $this->view("adminlayout", $data);
        }

        public function delete() {
            $id = $_POST['id'];
            $elementID = $_POST['elementID'];
            if(strpos($elementID, 'del_tl_') !== false) {
                $result = $this->category_model->deleteData(['ID_TheLoai' => $id]);
            }
            else {
                $result = $this->subcategory_model->deleteData(['ID_CTTheLoai' => $id]);
            }
            $return = json_decode($result, true);
            if($return['type'] == "success") {
                $this->subcategory_model->updateData(['ID_TheLoai' => 0], ['ID_TheLoai' => $id]);
                echo json_encode([
                    'result' => true,
                    'message' => $return['message']
                ]);
            }
        }
    }

?>