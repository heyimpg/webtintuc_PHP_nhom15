<?php
    class post extends Controller {
        private String $template = "admin/post";

        public function index() {
            $data = array(
                "page" => "$this->template/index"
            );
            $this->view("adminlayout", $data);
        }
    }
?>