<?php
    class facturaModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectolp3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function listar() {
            $sql = 'SELECT f.numero,f.fecha,concat(e.nombre," ",e.apellido) cliente,e.cin,SUM(d.cantidad*d.importe) total FROM facturas f JOIN detallefacturas d ON f.numero=d.numero JOIN estudiantes e ON f.idEstudiante=e.idEstudiante WHERE f.anulada=0 GROUP BY f.numero ORDER BY f.numero DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }        

        public function listarCursos() {
            $sql = 'SELECT * FROM cursos ORDER BY idCurso';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($factura) {
            $sql = 'SELECT * FROM facturas WHERE numero=:numero';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':numero',$factura);        
            return ($statement->execute()) ? $statement->fetch() : false;
        } 
        
        public function insertar($fecha,$idEstudiante,$idFormaPago) {
            $sql = 'INSERT INTO facturas VALUES (0,:fecha,:idEstudiante,:idFormaPago,0)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':fecha',$fecha);
            $statement->bindParam(':idEstudiante',$idEstudiante);
            $statement->bindParam(':idFormaPago',$idFormaPago);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($numero) {
            $sql = 'UPDATE facturas SET anulado=1 WHERE numero=:numero';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':numero',$numero);
            return ($statement->execute()) ? true : false;
        }

        public function cargarEstudiantes() {
            $sql = 'SELECT e.idEstudiante,concat(e.nombre," ",e.apellido) estudiante FROM estudiantes e ORDER BY e.nombre';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function cargarFormPagos() {
            $sql = 'SELECT f.idFormaPago,f.descripcion FROM formapagos f ORDER by f.idFormaPago';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

    }
?>