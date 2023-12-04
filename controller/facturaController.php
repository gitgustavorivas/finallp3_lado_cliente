<?php
    class facturaController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectolp3/routes.php');
            require_once(MODEL_PATH.'facturaModel.php');
            $this->model = new facturaModel();
        }

        public function search($factura){
            return ($this->model->buscar($factura) != false) ? $this->model->buscar($factura) : false;
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function listcursos(){
            return ($this->model->listarCursos()) ? $this->model->listarCursos() : false;
        }
        
        public function combolistestudiantes(){
            return ($this->model->cargarEstudiantes()) ? $this->model->cargarEstudiantes() : false;
        }

        public function combolistformapagos(){
            return ($this->model->cargarFormPagos()) ? $this->model->cargarFormPagos() : false;
        }
    }
?>