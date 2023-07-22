<?php

    class RolesModel extends Mysql{

        public $intIdRol;
        public $strRol;
        public $strDescripcion;
        public $intStatus;

        public function __construct(){
            parent::__construct();
        }

        // Crearemos la funcion selecRoles() creada en el controlador de "Roles:Controllers/Roles"
        public function selectRoles(){
          // Extraer Roles
          $sql = "SELECT * FROM rol WHERE status != 0";
          $request = $this->select_all($sql);
          return $request;
        }

        // Extraer Roles y mostrarlos en el modal de actualizar
        public function selectRol(int $idrol) {
            // Buscar rol
            $this->intIdRol = $idrol;
            $sql = "SELECT * FROM rol WHERE idrol = $this->intIdRol";
            $request = $this->select($sql);
            return $request;
        } 

        // Creamos la funcion de insertRol
        public function insertRol(string $rol, string $descripcion, int $status){
            $return = "";
            $this->strRol  = $rol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;
            $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol
            }' ";
            $request = $this->select_all($sql);

            // Validamos el request
            if (empty($request)) {
                // Si request es vacío y no encontro un registro,  entonces...
                $query_insert = "INSERT INTO rol(nombrerol,descripcion,status) VALUE (?,?,?)";
                $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
                $request_insert  = $this->insert($query_insert,$arrData);
                $return  = $request_insert;
            }else {
                // Sin en cambió, ya lo hay...
                $return = "exist";
            }
            return $return;
        }

		public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
    }


?>