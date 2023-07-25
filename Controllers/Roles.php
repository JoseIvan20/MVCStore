<?php

    class Roles extends Controllers {
        public function __construct(){
            parent::__construct();
        }

        public function roles(){
            $data['page_id'] = 3;
            $data['page_tag'] = "Roles Usuario";
            $data['page_name'] = "rol_usuario";
            $data['page_title'] = "Roles Usuario <small> Tienda Virtual</small>";
            $this->views->getView($this, "roles", $data);
        }

        //  Obtendremos los roles
        public function getRoles(){
            $arrData = $this->model->selectRoles();

            //  Mostramos en estilos de badge, el Activo e Inactivo dependiendo el valor (1 = Activo o 2 = Inactivo)
            for ($i=0; $i < count($arrData) ; $i++) { 
                if ($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="me-1 badge badge-pill bg-success">Activo</span>';
                }else {
                    $arrData[$i]['status'] = '<span class="me-1 badge badge-pill bg-danger">Inactivo</span>';
                }

                // Botones de acción
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"><i class="bi bi-key-fill"></i></button>
                <button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol('.$arrData[$i]['idrol'].')" title="Editar"><i class="bi bi-pencil-fill"></i></button>
                <button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idrol'].')" title="Eliminar"><i class="bi bi-trash-fill"></i></button>
                </div>';
            }
            // dep($arrData[0]['status']);
            // exit;
            // dep($arrData);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        // Extraer un Rol 
        public function getRol($idrol){
            $intIdRol = intval(strClean($idrol));
            if ($intIdRol > 0) {
                $arrData = $this->model->selectRol($intIdRol);
                if (empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else {
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        // Crear un Rol
        public function setRol(){
            // dep($_POST);
            // Creamos variables para almacenar los datos que crearemos en el modal de 'Nuevo Rol'
            $intIdrol = intval($_POST['idRol']);
            $strRol =  strClean($_POST['txtNombre']);
            $strDescipcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);
            // Envíaremos esa información al modelo y lo hacemos refiriendose al método 'insert' de myql

            // Haremos una validación poara poder actualizar el rol
            if($intIdrol == 0)
            {
                // El 0 quiere decir que sino tiene un Id, entonces está creando uno nuevo...Por tanto, hacemos al llamada al insertRol 
                // Crear
                $request_rol = $this->model->insertRol($strRol, $strDescipcion,$intStatus);
                $option = 1;
            }else{
                // De lo contrario sino es 0, si trae un Id, actualizamos el Rol con el metodo updateRol()
                // Actutlizar
                $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescipcion, $intStatus);
                $option = 2;
            }

            if($request_rol > 0 )
            // Haremos otra validación con respecto al método de updateRol
            {
                if($option == 1)
                {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                }
            }else if($request_rol == 'exist'){
                
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
            }else{
                $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
        }

        // Eliminar un Rol
        public function delRol(){
            if ($_POST) {
                $intIdRol = intval($_POST['idrol']);
                $requestDelete = $this->model->deleteRol($intIdRol);
                if ($requestDelete == 'ok') {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol.');
                }elseif ($requestDelete == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el Rol asociado a usuarios.');
                }else {
                    $arrResponse = array('status' => false,'msg' => 'Error al eliminar el Rol');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        
    }


?>