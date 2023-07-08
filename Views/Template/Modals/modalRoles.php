<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h1 class="modal-title fs-5" id="titleModal">Nuevo Rol</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formRol" name="formRol">
              <input type="hidden" id="idRol" name="idRol" value="">
              <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" placeholder="Nombre del rol" id="txtNombre" name="txtNombre">
              </div>
              <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" rows="2" placeholder="Descripción del rol" id="txtDescripcion" name="txtDescripcion"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleSelect1">Estado</label>
                <select class="form-control" id="listStatus" name="listStatus">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill me-2"></i>Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>