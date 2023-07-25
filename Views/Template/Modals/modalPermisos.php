<!-- Modal de Permisos -->
<div class="modal fade modalPermisos" id="modalPermisos">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title h4">Permisos Roles de Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <?php
        // dep($data);
        ?>
        <div class="col-md-12">
          <div class="tile">
            <form action="" id="formPermisos" name="formPermisos">
              <!-- Añadimos un input para almacenar los permisos -->
              <input type="hidden" id="idrol" name="idrol">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Módulos</th>
                      <th>Leer</th>
                      <th>Escribir</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $no = 1;
                    // Será igual a $data e ingresamos el item modulo. El item de 'modulos' creado en el controlador Permisos línea = 41($arrPermisoRol['modulos'] = $arrModulos;)
                    $modulos = $data['modulos'];
                    // Con el ciclo for recorremos de...
                    // Ya que en el array inician desde 0, y contará hasta la cantidad de elementos que haya de 1 en 1
                    for ($i = 0; $i < count($modulos); $i++) {
                      // permisos = que será igual modulos en su posición e iniciará en 0 e ingresará al item de 'permisos'
                      $permisos = $modulos[$i]['permisos'];
                      // Crearemos variables 'Check' poniendo en principio la acción o módulo. Nos servirá para setear el atributo checked en cada uno de los input (refiriendonos al input con clase : toggle-flip). Si trae el valor de 'checked', estará activo.
                      $rCheck = $permisos['r'] == 1 ? " checked " : "";
                      $wCheck = $permisos['w'] == 1 ? " checked " : "";
                      $uCheck = $permisos['u'] == 1 ? " checked " : "";
                      $dCheck = $permisos['d'] == 1 ? " checked " : "";

                      $idmod = $modulos[$i]['idmodulo'];

                    ?>

                    <tr>
                      <td>
                        <!-- Colocaremos la variable $no, y colocamos un input de tipo 'hidden', debajo -->
                        <?= $no; ?>
                        <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                      </td>
                      <td>
                        <!-- Colocaremos el titulo del modulo -->
                        <?= $modulos[$i]['titulo']; ?>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name="modulos[<?= $i ?>][r]" <?= $rCheck; ?>><span
                              class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name="modulos[<?= $i ?>][w]" <?= $wCheck; ?>><span
                              class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name="modulos[<?= $i ?>][u]" <?= $uCheck; ?>><span
                              class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name="modulos[<?= $i ?>][d]" <?= $dCheck; ?>><span
                              class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <?php $no++; 
                  }?>
                  </tbody>
                </table>
                <!-- Botones de Acción de Permisos -->
                <div class="text-center">
                  <button id="btnActionForm" class="btn btn-success" type="submit"><i
                      class="bi bi-check-circle-fill me-2"></i><span
                      id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i
                      class="bi bi-x-circle-fill me-2"></i>Salir</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>