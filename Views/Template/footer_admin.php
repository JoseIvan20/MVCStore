    <script>
      const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <script src="<?= media(); ?>/js/functions_admin.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/bootstrap-select.js"></script>
    <script src="<?= media(); ?>/js/plugins/sweetalert2@11.js"></script>
    <!-- Código PHP para la carga individual de JS -->
    <?php
      if ($data['page_name'] == "rol_usuario") {
    ?>
    <script src="<?= media(); ?>/js/functions_roles.js?v=1.21"></script>
    <?php
      }
    ?>
    <?php
      if ($data['page_name'] == "usuarios") {
    ?>
    <script src="<?= media(); ?>/js/functions_usuarios.js?v=1.7"></script>
    <?php
      }
    ?>

  </body>
</html>