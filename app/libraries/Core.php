<?php

    class Core {

        protected $currentController = "Pages";
        protected $currentMethod = "index";
        protected $params = [];

        public function __construct(){
           $url = $this->getUrl();
            // Look in the controllers folder for the assigned controller  and capitalize it

            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                // Note Core is initialize in index.php in public. That is the reason for referencing app folder here
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

             // Require the controller
             require_once('../app/controllers/'.$this->currentController.'.php');
             // Initialize the controller
             $this->currentController = new $this->currentController;

             if(isset($url[1])){
                 if(method_exists($this->currentController, $url[1])){
                     $this->currentMethod = $url[1];
                     unset($url[1]);
                 }
             }

            //  Get all parameters
            $this->params = $url ??  [];
            
            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }

        public function getUrl(){
            if(isset($_GET["url"])){
                $url = rtrim($_GET["url"], '/');
                // Allows filtering of variable as string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);

                $url = explode('/', $url);
                return $url;
            }
        }


    }



?>