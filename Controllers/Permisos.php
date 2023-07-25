<?php

    class Permisos extends Controllers {
        public function __construct(){
            parent::__construct();
        }

        public function getPermisosRol(int $idrol){
            $rolid = intval($idrol);
            if ($rolid > 0) {
                $arrModulos = $this->model->selectModulos();
                $arrPermisosRol = $this->model->selectPermisosRol($rolid);

                // dep($arrModulos);
                // dep($arrPermisosRol);
                // Crearemos una variable que contendrá el CRUD
                $arrPermisos = array('r' => 0 , 'w' => 0, 'u' => 0, 'd' => 0);
                $arrPermisoRol = array('idrol' => $rolid);

                if (empty($arrPermisosRol)) {
                    for ($i=0; $i < count($arrModulos) ; $i++) { 
                        // En cada registro le añadirá 'permisos', que corresponden a las 4 operaciones basicas, osea el CRUD
                        $arrModulos[$i]['permisos'] = $arrPermisos;
                    }
                }else {
                    // Va a llegar a la cantidad de registros que tenga el array 'módulos', e irá incrementando
                    for ($i=0; $i < count($arrModulos) ; $i++) { 
                        // Modificar cada uno de los items del array 'permisos' en la variable de '$arrModulos'
                        $arrPermisos = array('r' => $arrPermisosRol[$i]['r'], 
                                             'w' => $arrPermisosRol[$i]['w'], 
                                             'u' => $arrPermisosRol[$i]['u'], 
                                             'd' => $arrPermisosRol[$i]['d']);
                        // Estamos validando el array de 'modulos'
                        if ($arrModulos[$i]['idmodulo'] == $arrPermisosRol[$i]['moduloid']) {
                            // Si la validación $arrModulos y $arrPermisosRol son iguales, entonces...
                            $arrModulos[$i]['permisos'] = $arrPermisos;
                        } 
                    }
                }
                // Crearemos una posición llamada 'modulos' y le asignamos lo que es el array de 'modulos'
                $arrPermisoRol['modulos'] = $arrModulos;
                // dep($arrPermisoRol);

                // dep lo usamos para visualizar la información, ahora, cargaremos toda esa información en el modal.
                $html = getModal("modalPermisos",$arrPermisoRol);
            }
        }

        public function setPermisos() {
            // Validamos si estamos envíando información a traves del método POST
            if ($_POST) {
                // Si es así...
                // Convertirá en un entero el método POST que va a recibir el idrol
                $intIdrol = intval($_POST['idrol']);
                // Vamos a obtener que es 'modulos' que corresponden a una array y tendrá una variable llamada igual 'modulos' y que estamos envíando por el método POST
                $modulos = $_POST['modulos'];

                // Estamos haciendo referencia al model de deletePemrisos que vamos a enviarle como parametros el idRol que se tiene en la variable $intIdRol. deletePermisos() estará en el model de ModelPermisos
				$this->model->deletePermisos($intIdrol);
                // El búcle foreach, indica que va a recorrer todios los elementos que contiene el array de $modulos
                foreach ($modulos as $modulo) { 
                    // Por medio de as, asignamos a $modulo cada uno de los elementos que tiene el array de $modulos
                    $idModulo = $modulo['idmodulo'];
                    // Va a tomar el elemento 'idmodulo' y se lo va asginar a la variable $idModulo
                    $r = empty($modulo['r']) ? 0 : 1;
                    // $r = Lo que hacemos es verificar con empty, si viene vacío o fue envíado este elemento; SIno fue envíado, tendrá un 0. Y si fue envíado, tenrá 1(? 0 : 1) 
                    $w = empty($modulo['w']) ? 0 : 1;
					$u = empty($modulo['u']) ? 0 : 1;
					$d = empty($modulo['d']) ? 0 : 1;

                    // Variable $requestPermiso = estamos haciendo referencia al metodo insertPermisos y le vamos a enviar como paramatros el intIdRol, idModulo,$r,$w,$u,$d;
                    $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
                }
                if ($requestPermiso > 0) {
                    $arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'No es posible asignar los permisos.');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }


?>