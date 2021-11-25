<?php
    class App {
        protected $controller = "home";
        protected $action = "index";
        protected $params = [];

        public function __construct()
        {
            $array = $this->urlProcess();
            if($array != NULL) {
                // http://localhost:8080/CNPM/webtintuc_PHP_nhom15/home/index -> home is controller, index is action
                if ($array[0] != "admin") {
                    if (file_exists("./app/controllers/{$array[0]}.php")) {
                        $this->controller = $array[0];
                        unset($array[0]);
                        require_once "./app/controllers/{$this->controller}.php";
                    }
                    else {
                        require_once "./app/views/pages/include/error/page_404.php";
                        exit();
                    }
                }
                // http://localhost:8080/CNPM/webtintuc_PHP_nhom15/admin/home -> 2nd admin is controller
                else {
                    // if(file_exists("./app/controllers/admin/{$array[0]}.php")) {
                        unset($array[0]);
                        // http://localhost:8080/CNPM/webtintuc_PHP_nhom15/admin/home/index
                        if (isset($array[1])) {
                            if(file_exists("./app/controllers/admin/{$array[1]}.php")) {
                                $this->controller = $array[1];
                                unset($array[1]);
                                require_once "./app/controllers/admin/{$this->controller}.php";
                                // http://localhost:8080/CNPM/webtintuc_PHP_nhom15/admin/category/getallcategory -> subcategory is controller, getallcategory is action
                                if(isset($array[2])) {
                                    if(method_exists($this->controller, $array[2])) {
                                        $this->action = $array[2];
                                        unset($array[2]);
                                    }
                                }
                            }
                            else {
                                $this->controller = "home";
                            }
                            unset($array[1]);
                        }
                        else {
                            $this->controller = "home";
                        }
                        require_once "./app/controllers/admin/{$this->controller}.php";
                    // }
                }
            }
            else {
                require_once "./app/controllers/{$this->controller}.php";
            }

            $this->controller = new $this->controller();

            if(isset($array[1])) {
                if(method_exists($this->controller, $array[1])) {
                    $this->action = $array[1];
                    unset($array[1]);
                }
            }
            $this->params = $array ? array_values($array):[];
            call_user_func_array([$this->controller, $this->action], $this->params);
        }

        public function urlProcess() {
            if(isset($_GET['url'])) {
                return explode("/", filter_var(trim($_GET['url'], "/")));
            }
            return false;
        }

    }
?>