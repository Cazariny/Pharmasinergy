<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class=""></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pharmasinergy</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones de Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php
      if ($_SESSION['noRolUsuario']==1) {
     ?>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudUsuarios.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Usuarios</span></a>
     </li>
    <li class="nav-item">
        <a class="nav-link" href="../proyecto/crudDoctores.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Doctores</span></a>
    </li>
    <?php } ?>
    <?php
      if ($_SESSION['noRolUsuario']==2) {
     ?>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudPacientes.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Pacientes</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudConsultas.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Consultas</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudEMedicos.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Expedientes Medicos</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudDoctores.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Doctores</span></a>
     </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <?php } ?>

    <?php
      if ($_SESSION['noRolUsuario']==3) {
     ?>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudProductos.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Productos</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudOrdenes.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Ordenes</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudClientes.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Clientes</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudMedicamentos.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Medicamentos</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudMarcas.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Marcas</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="../proyecto/crudlaboratorio.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Laboratorios</span></a>
     </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
