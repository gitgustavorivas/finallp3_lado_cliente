<?php
    class clienteController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectolp3/routes.php');
            require_once(MODEL_PATH.'clienteModel.php');
            $this->model = new clienteModel();
        }
       
        public function insert($nombre,$apellido,$edad,$idCiudad,$ci){
            $id = $this->model->insertar($nombre,$apellido,$edad,$idCiudad,$ci);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        }
        
        public function update($id,$nombre,$apellido,$edad,$idCiudad,$ci){
            return ($this->model->actualizar($id,$nombre,$apellido,$edad,$idCiudad,$ci) != false) ? header('location: ./index.php') : header('location: ./edit.php?id='.$id);
        }
        
        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php') ;
        }
        
        public function search($id){
            return ($this->model->buscar($id) != false) ? $this->model->buscar($id) : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function combolist(){
            return ($this->model->cargarDesplegable()) ? $this->model->cargarDesplegable() : false;
        }
        
    }
?>