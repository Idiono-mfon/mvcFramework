<?php

    abstract class Controller {

        public function model($model){
            // Require the model file
            if(file_exists("../app/models/".$model.".php")){
                require('../app/models/'.$model.".php");
                // Instantiate the model
                return new $model();
            }
            
            die("Model does not exist");
        }

        // Load the View

        public function view($view, $data = []){
            if(file_exists("../app/views/".$view.".php")){
                require_once("../app/views/".$view.".php");
            }else{
                die("Model does not exist");
            }
        }


    }



?>