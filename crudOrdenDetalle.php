<?php
// Inicializacion de manejo de sesión
   session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['autenticado']!='si'){
     header("Location:../proyecto/login.php?error=1");
}
require ('conexion.php');


if (isset($_GET['detalle'])){

 $idOrden = $_GET['id_orden'];

 $sql4 = "SELECT * FROM Ordenes WHERE Id_Orden= $idOrden";
         $result4 = $conn->query($sql4);
         if ($result4->num_rows > 0) {
             $row4 = $result4->fetch_assoc();
           }
          }

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


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Detalles de Orden </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detalles de la orden Orden</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>Id Producto</th>
                                          <th>Producto</th>
                                          <th>Cantidad</th>
                                          <th>PU</th>
                                          <th>Importe</th>
                                          <th>Actualizar</th>
                                          <!-- <th>Eliminar</th> -->
                                          <th>Guardar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Id Producto</th>
                                          <th>Producto</th>
                                          <th>Cantidad</th>
                                          <th>PU</th>
                                          <th>Importe</th>
                                          <th>Actualizar</th>
                                          <!-- <th>Eliminar</th> -->
                                          <th>Guardar</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                      <?php
                                      //Verificando Conexion
                                      if ($conn->connect_error) {
                                        die("Conexion Fallida: " . $conn->connect_error);
                                      } else {
                                        //Borrar un detalle de orden de la tabla ODetalle en vase a su Id_ODetalles
                                        // if (isset($_GET['eliminar'])) {
                                        //   $idDet2 = $_GET['id_odetalle'];
                                        //
                                        //   $sql2 = "DELETE
                                        //   FROM OrdenDetalle
                                        //   WHERE Id_ODetalle = $idDet2";
                                        //   // echo $sql2;
                                        //   $result = $conn->query($sql2);
                                        //   $sqlupd = "UPDATE Ordenes AS ORD
                                        //   SET Total = (SELECT SUM(DET.Importe) FROM OrdenDetalle  as DET
                                        //   WHERE ORD.Id_Orden = DET.Id_Orden)";
                                        //   $conn->query($sqlupd);
                                        // }

                                        if (isset($_POST['actualizar'])){
                                          $Producto = $_POST['Producto'];
                                          $Cantidad = $_POST['numCantidad'];
                                          $PU = $_POST['numPU'];
                                          $Importe = $PU * $Cantidad;
                                          $idDet =$_POST['id_odetalle'];
                                          $sql4 = "UPDATE OrdenDetalle SET Id_Producto='$Producto',
                                          Cantidad='$Cantidad', PU=$PU, Importe='$Importe' WHERE Id_ODetalle = $idDet";
                                          $conn->query($sql4);
                                          $sqlupd = "UPDATE Ordenes AS ORD
                                          SET Total = (SELECT SUM(DET.Importe) FROM OrdenDetalle  as DET
                                          WHERE ORD.Id_Orden = DET.Id_Orden)";
                                          $conn->query($sqlupd);
                                        }

                                        //Insertar un nuevo detalle de orden
                                        if(isset($_POST['alta'])){
                                          $Producto = $_POST['Producto'];
                                          $Cantidad = $_POST['numCantidad'];
                                          $PU = $_POST['numPU'];
                                          $Importe = $PU * $Cantidad;
                                          $Orden = $idOrden;
                                          //COMPROBAR SI SE ELIJIERON MAS PRODUCTOS DE LOS QUE HAY EN EXISTENCIA 
                                          // $sqlch = "SELECT DET.Id_ODetalle, DET.Id_Orden, PRO.Descripcion, DET.Cantidad, DET.PU, DET.Importe, PRO.Existencia
                                          // FROM OrdenDetalle as DET
                                          // JOIN Productos as PRO
                                          // ON PRO.Id_Producto = DET.Id_Producto";
                                          // $conn->query($sqlch);
                                          // if (if ) {
                                          //   // code...
                                          // }
                                          //

                                          $sql3 = "INSERT INTO OrdenDetalle(Id_ODetalle, Id_Orden, Id_Producto, Cantidad, PU, Importe)
                                          VALUES(0, '$Orden',  '$Producto', '$Cantidad', '$PU', '$Importe' )";
                                          $conn->query($sql3);
                                          $sqlupd = "UPDATE Ordenes AS ORD
                                          SET Total = (SELECT SUM(DET.Importe) FROM OrdenDetalle  as DET
                                          WHERE ORD.Id_Orden = DET.Id_Orden)";
                                          $conn->query($sqlupd);
                                        }

                                        $sql = "SELECT DET.Id_ODetalle, DET.Id_Orden, PRO.Descripcion, DET.Cantidad, DET.PU, DET.Importe
                                        FROM OrdenDetalle as DET
                                        JOIN Productos as PRO
                                        ON PRO.Id_Producto = DET.Id_Producto";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                                         ?>
                                        <tr>
                                            <td><?php  echo $row['Id_ODetalle'] ?></td>
                                            <td><?php  echo $row['Descripcion'] ?></td>
                                            <td><?php  echo $row['Cantidad'] ?></td>
                                            <td><?php  echo $row['PU'] ?></td>
                                            <td><?php  echo $row['Importe'] ?></td>
                                            <td><a href="../proyecto/crudOrdenDetalle.php?actualizar&id_orden=<?php echo $row['Id_Orden'] ?>&id_odetalle=<?php echo $row['Id_ODetalle']?>">Actualizar</a> </td>
                                            <!-- <td><a href="../proyecto/crudOrdenDetalle.php?id_orden=<?php echo $row['Id_Orden'] ?>&id_odetalle=<?php echo $row['Id_ODetalle'].'&eliminar=1'?>">Eliminar</a> </td> -->
                                            <td><a href="../proyecto/crudOrdenes.php">Guardar</a> </td>
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
                    <?php include "altaModificacionODetalle.php" ?>

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
    function llenarPrecio(e) {
      var precio =  e.target.selectedOptions[0].getAttribute("PU")
      document.getElementById("PU").value = precio;
    }
    </script>

</body>

</html>
