<?php 
    class err extends Controller {

        private String $template = "pages/err";

        public function index() {
            $this->inprogress();
        }

        public function forbidden() {
            $this->view("$this->template/page_403");
        }
        public function pagenotfound() {
            $this->view("$this->template/page_404");
        }
        public function inprogress() {
            $this->view("$this->template/in_progress");
        }

    }
?>