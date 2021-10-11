<?php
    class home extends Controller {
        private Model $my_model;
        private String $table_name = "theloai";

        public function __construct() {
//            $this->my_model = $this->model("Model");
        }

        public function index() {
//            $kq = $this->my_model->get_all_data("$this->table_name", "*", $where);
            $data = [
                "page" => "home/index",
//                "array" => $kq
            ];
//            $where = array(
//                "ID_TheLoai" => 22
//            );
            $this->view("layout", $data);
        }

        public function add() {
            $array = array(
                "TenTheLoai" => "TT"
            );
            $where = array(
                "ID_TheLoai" => 22,
                "TenTheLoai" => "GT"
            );
            $kq = $this->my_model->select_row($this->table_name, "ID_TheLoai, TenTheLoai", $where);
            var_dump($kq);
        }
    }
?>