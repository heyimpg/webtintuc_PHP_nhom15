<?php
    class Redirect
    {
        public function __construct($index = "") {
            if($index != "") {
                header("Location: $index");
            }
        }

        public function setFlash($type, $text=""){
            if(isset($_SESSION[$type])) {
                $message = $_SESSION[$type];
                unset($_SESSION[$type]);
                return $message;
            }
            else {
                $_SESSION[$type] = $text;
            }
            return "";
        }
    }
?>