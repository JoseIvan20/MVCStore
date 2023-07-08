
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
                <button class="btn btn-secondary btn-sm btnPermisosRol" rl="'.$arrData[$i]['idrol'].'" title="Permisos"><i class="bi bi-key-fill"></i></button>
                <button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['idrol'].'" title="Editar"><i class="bi bi-pencil-fill"></i></button>
                <button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['idrol'].'" title="Eliminar"><i class="bi bi-trash-fill"></i></button>
                </div>';
            }
            // dep($arrData[0]['status']);
            // exit;
            // dep($arrData);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setRol(){
            // dep($_POST);
            // Creamos variables para almacenar los datos que crearemos en el modal de 'Nuevo Rol'
            $strRol = strClean($_POST['txtNombre']);
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);
            // Envíaremos esa información al modelo y lo hacemos refiriendose al método 'insert' de myql
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);

            if ($request_rol > 0) {
                $arrResponse = array('status' => true, 'msg'  => 'Datos guardados correctamente.');
            }else if($request_rol == 'exist'){
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
            }else {
                $arrResponse = array('status' => false, 'msg' => 'No es  posible almacenar los datos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

    }


?>