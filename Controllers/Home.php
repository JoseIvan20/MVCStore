<?php

    class Home extends Controllers {
        public function __construct(){
            parent::__construct();
        }

        public function home(){
            $data['page_id'] = 1;
            $data['tag_page'] = "Home";
            $data['page_title'] = "Página principal";
            $data['page_name'] = "home";
            $this->views->getView($this, "home", $data);
        }
        // Insertar
        public function insertar(){
            $data = $this->model->setUser("Fernanda", 21);

            $data = $this->model->setUser("Ariel", 23);
            print_r($data);
        }
        // Ver usuarios
        public function verusuario($id){
            $data = $this->model->getUser($id);
            print_r($data);
        }
        // Actualizar registros
        public function actualizar(){
            $data = $this->model->updateUser(1,"Pepe",18);
            print_r($data);
        }
        // Obtener registros
        public function verusuarios(){
            $data = $this->model->getUsers();
            print_r($data);
        }
        // Eliinar 
        public function eliminarUsuario($id){
            $data = $this->model->delUser($id);
            print_r($data);
        }
    }


?>