<?php 
  headerAdmn($data); 
  getModal('modalUsuarios',$data);
?>
  <div id="contentAjax"></div>
    <!-- Sidebar menu-->

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>
            <i class="bi bi-person-lines-fill"></i> <?= $data['page_title'] ?>
            <button class="btn btn-primary" type="button" onclick="openModal();"><i class="bi bi-plus-circle-fill"></i>&nbsp;Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tabelRoles">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Email</th>
                      <th>Teléfono</th>
                      <th>Rol</th>
                      <th>Status</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Carlos</td>
                      <td>Hernandez</td>
                      <td>ivanjg1029gmail.com</td>
                      <td>5516474137</td>
                      <td>Administrador</td>
                      <td>Activo</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
    <?php footerAdmin($data); ?>