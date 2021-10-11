<?php
    class App {
        protected $controller = "home";
        protected $action = "index";
        protected $params = [];

        public function __construct()
        {
            $array = $this->urlProcess();
            if($array != NULL) {
                if(file_exists("./app/controllers/{$array[0]}.php")) {
                    $this->controller = $array[0];
                    unset($array[0]);
                    require_once "./app/controllers/{$this->controller}.php";
                }
                else if(file_exists("./app/controllers/admin/{$array[0]}.php")) {
                    $this->controller = $array[0];
                    unset($array[0]);
                    require_once "./app/controllers/admin/{$this->controller}.php";
                }
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
        }

    }
?>