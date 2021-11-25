<?php
    if(!isset($_SESSION)) {
        session_start();
    }

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

        public function flash($name="", $message= "", $class="text-danger") {
            if(!empty($name)) {
                if(!empty($message) && empty($_SESSION[$name])) {
                    $_SESSION[$name] = $message;
                    $_SESSION[$name."_class"] = $class;
                }
                else if(empty($message) && !empty($_SESSION[$name])) {
                    $class = !empty($_SESSION[$name."_class"]) ? $_SESSION[$name."_class"] : $class;
                    echo "<div class='".$class."'>".$_SESSION[$name]."</div>";
                    unset($_SESSION[$name]);
                    unset($_SESSION[$name."_class"]);
                }
                
            }
        }

        public function redirect($location) {
            if(!empty($location)) {
                header("Location:".$location);
                exit();
            }
        }
    }
?>