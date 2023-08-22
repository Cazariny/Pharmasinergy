<?php
// Inicializacion de manejo de sesión
   session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['autenticado']!='si'){
     header("Location:../proyecto/login.php?error=1");
}
require ('conexion.php');
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
                            <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                   Pharmasinergy
                      </div> -->
                    </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ordenes</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Ordenes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>Id_Orden</th>
                                          <th>Nombre Cliente</th>
                                          <th>Fecha</th>
                                          <th>Total</th>
                                          <th>Actualizar</th>
                                          <th>Eliminar</th>
                                          <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Id_Orden</th>
                                          <th>Nombre Cliente</th>
                                          <th>Fecha</th>
                                          <th>Total</th>
                                          <th>Actualizar</th>
                                          <th>Eliminar</th>
                                          <th>Detalles</th>
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
                                          $idOrd2=$_GET['id_orden'];
                                          $sql2 = "DELETE FROM Ordenes WHERE Id_Orden ='$idOrd2'";

                                          $result = $conn->query($sql2);
                                        }

                                        if (isset($_POST['actualizar'])){
                                          $Cliente = $_POST['Cliente'];
                                          $Fecha = $_POST['Fecha'];
                                          // $Total = $_POST['numTotal'];
                                          $Consulta = $_POST['consulta'];
                                          $idOrd =$_POST['id_orden'];
                                          $sql4 = "UPDATE Ordenes SET Id_Cliente='$Cliente',
                                          Fecha='$Fecha', Id_Consulta='$Consulta' WHERE Id_Orden = $idOrd";
                                          $conn->query($sql4);
                                        }

                                        //Insertar un nuevo Orden
                                        if(isset($_POST['alta'])){
                                          $Cliente = $_POST['Cliente'];
                                          $Fecha = $_POST['Fecha'];
                                          $Total = 0;
                                          $Consulta = $_POST['consulta'];

                                          $sql3 = "INSERT INTO Ordenes(Id_Orden, Id_Cliente, Fecha, Total, Id_Consulta)
                                          VALUES(0, '$Cliente', '$Fecha', '$Total', '$Consulta')";
                                          $conn->query($sql3);
                                        }

                                        $sql = "SELECT * FROM Ordenes";

                                        $sql = "SELECT ORD.Id_Orden, CONCAT(CLI.Nombre, ' ', CLI.Apellido) as Nombre, ORD.Fecha, ORD.Total, CON.Id_Consulta
                                        FROM Ordenes AS ORD
                                        JOIN Cliente as CLI
                                        ON CLI.Id_Cliente = ORD.Id_Cliente
                                        JOIN Consulta as CON
                                        ON CON.Id_Consulta = ORD.Id_Consulta";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                                         ?>
                                        <tr>
                                            <td><?php  echo $row['Id_Orden'] ?></td>
                                            <td><?php  echo $row['Nombre'] ?></td>
                                            <td><?php  echo $row['Fecha'] ?></td>
                                            <td><?php  echo $row['Total'] ?></td>

                                            <td><a href="../proyecto/crudOrdenes.php?actualizar&id_orden=<?php echo $row['Id_Orden'] ?>">Actualizar</a> </td>
                                            <td><a href="../proyecto/crudOrdenes.php?id_orden=<?php echo $row['Id_Orden'].'&eliminar=1' ?>">Eliminar</a> </td>
                                            <td><a href="../proyecto/crudOrdenDetalle.php?detalle&id_orden=<?php echo $row['Id_Orden']?>">Detalles</a> </td>
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
                    <?php include "altaModificacionOrdenes.php" ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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

</body>

</html>
