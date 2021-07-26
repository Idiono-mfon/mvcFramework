<?php


    class Pages extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function index(){

            $data['users'] = $this->userModel->getUsers();

            return $this->view('pages/index', $data);
        }

        public function about (){
          
           return $this->view('pages/about');
        }

       
    }


?>