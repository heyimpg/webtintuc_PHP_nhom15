<?php

    class Controller
    {
        public function view($view, $data = []) {
            require_once "./app/views/{$view}.php";
        }

        public function model($model) {
            if(file_exists("./app/models/{$model}.php")) {
                require_once "./app/models/{$model}.php";
            }
            else {
                require_once "./app/models/admin/{$model}.php";
            }
            return new $model();
        }
    }
?>