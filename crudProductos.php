<?php
// Inicializacion de manejo de sesión
   session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['autenticado']!='si'){
     header("Location:../proyecto/login.php?error=1");
}
require ('conexion.php')
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
         <?php include "barraLateral.php"?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- barra de navegacion Topbar-->

     <?php include "barraNavegacion.php"?>

               <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                 <div class="card shadow mb-4">
                          <!-- Card Header -->
                            
                    </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Productos</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Producto</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Costo</th>
                                            <th>Existencia</th>
                                            <th>Actualizar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Producto</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Costo</th>
                                            <th>Existencia</th>
                                            <th>Actualizar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                      <?php
                                      //Verificando Conexion
                                      if ($conn->connect_error) {
                                        die("Conexion Fallida: " . $conn->connect_error);
                                      } else {
                                        //Borrar un usario de la tabla usuario en vase a su id_usuario
                                        if (isset($_GET['eliminar'])) {
                                          $idpro2=$_GET['id_producto'];
                                          $sql2 = "DELETE FROM Productos WHERE Id_Producto ='$idpro2'";

                                          $result = $conn->query($sql2);
                                        }

                                        if (isset($_POST['actualizar'])){
                                          $IsMedicamento = $_POST['checkMedicamento'];
                                          if ($IsMedicamento == 1) {
                                          $Medicamento = $_POST['Medicamento'];
                                        } else {
                                          $Medicamento = 0;
                                        }
                                          $Producto = $_POST['txtProducto'];
                                          $Descripcion = $_POST['txtDescripcion'];
                                          $Marca = $_POST['Marca'];
                                          $UnidadMedida = $_POST['txtUMedida'];
                                          $CostDir = $_POST['numCostDir'];
                                          $Precio = $_POST['numPrecio'];
                                          $Existencia = $_POST['numExist'];
                                          $PuntoReorden = $_POST['numPReorden'];
                                          $idPro =$_POST['id_producto'];
                                          $sql4 = "UPDATE Productos SET Id_Medicamento='$Medicamento',
                                          EsMedicamento='$IsMedicamento',
                                          Nombre = '$Producto',
                                          Descripcion='$Descripcion',
                                          Id_Marca='$Marca',
                                          UnidadMedida='$UnidadMedida',
                                          CostoDirecto='$CostDir',
                                          Precio='$Precio',
                                          Existencia='$Existencia',
                                          PuntoReorden='$PuntoReorden'
                                          WHERE Id_Producto = $idPro";
                                          $conn->query($sql4);
                                        }

                                        //Insertar un nuevo Usuario
                                        if(isset($_POST['alta'])){
                                          $IsMedicamento = $_POST['checkMedicamento'];
                                          if ($IsMedicamento == 1) {
                                          $Medicamento = $_POST['Medicamento'];
                                        } else {
                                          $Medicamento = 0;
                                        }
                                          $Producto = $_POST['txtProducto'];
                                          $Descripcion = $_POST['txtDescripcion'];
                                          $Marca = $_POST['Marca'];
                                          $UnidadMedida = $_POST['txtUMedida'];
                                          $CostDir = $_POST['numCostDir'];
                                          $Precio = $_POST['numPrecio'];
                                          $Existencia = $_POST['numExist'];
                                          $PuntoReorden = $_POST['numPReorden'];

                                          $sql3 = "INSERT INTO Productos(Id_Producto,
                                            Id_Medicamento,
                                            EsMedicamento,
                                            Nombre,
                                            Descripcion,
                                            Id_Marca,
                                            UnidadMedida,
                                            CostoDirecto,
                                            Precio,
                                            Existencia,
                                            PuntoReorden)
                                          VALUES(0,
                                            '$Medicamento',
                                            '$IsMedicamento',
                                            '$Producto',
                                            '$Descripcion',
                                            '$Marca',
                                            '$UnidadMedida',
                                            '$CostDir',
                                            '$Precio',
                                            '$Existencia',
                                            '$PuntoReorden')";
                                          $conn->query($sql3);
                                        }

                                        $sql = "SELECT * FROM Productos";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                                         ?>
                                        <tr>
                                            <td><?php  echo $row['Id_Producto'] ?></td>
                                            <td><?php  echo $row['Nombre'] ?></td>
                                            <td><?php  echo $row['Descripcion'] ?></td>
                                            <td><?php  echo $row['CostoDirecto'] ?></td>
                                            <td><?php  echo $row['Existencia'] ?></td>
                                            <td><a href="../proyecto/crudProductos.php?actualizar&id_producto=<?php echo $row['Id_Producto'] ?>">Actualizar</a> </td>
                                            <td><a href="../proyecto/crudProductos.php?id_producto=<?php echo $row['Id_Producto'].'&eliminar=1' ?>">Eliminar</a> </td>
                                        </tr>
                                        <?php
                                      }//Cierre While
                                    }// Cierre IF
                                  } //Cierre IF

                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php include "altaModificacionProducto.php" ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright EABMODEL; Pharmasinergy 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Estas a punto de  salir de tu sesión </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Aceptar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
    function selectMed(e) {
      var nombre =  e.target.selectedOptions[0].getAttribute("nombre")
      document.getElementById("Nom_Producto").value = nombre;
      // document.getElementById("Nom_Producto").setAttribute("disabled", "disabled");
    }
      $("#checkbox").change(function() {

        document.getElementById("Med").removeAttribute("disabled");
    });




    </script>

</body>

</html>
