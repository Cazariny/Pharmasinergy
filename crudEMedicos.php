<?php
// Inicializacion de manejo de sesión
   session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['autenticado']!='si'){
     header("Location:../proyecto/login.php?error=1");
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
                 <div class="card shadow mb-4">
                          <!-- Card Header -->
                            <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                   Pharmasinergy
                      </div> -->
                    </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Historia Clinica</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Historias Clinicas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Historia</th>
                                          <th>Nombre Paciente</th>
                                          <th>Informacion</th>
                                          <th>Altura</th>
                                          <th>Peso</th>
                                          <th>Actualizar</th>
                                          <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Id Expediente</th>
                                          <th>Nombre Paciente</th>
                                          <th>Informacion</th>
                                          <th>Altura</th>
                                          <th>Peso</th>
                                          <th>Actualizar</th>
                                          <th>Eliminar</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                      <?php
                                      $servername = "localhost";
                                      $username = "root";
                                      $password = "";
                                      $dbname = "Pharmasinergy";
                                      //CREANDO CONEXION A LA BASE DE DATOS
                                      $conn = new mysqli($servername, $username, $password, $dbname, 3307);
                                      //Verificando Conexion
                                      if ($conn->connect_error) {
                                        die("Conexion Fallida: " . $conn->connect_error);
                                      } else {
                                        //Borrar un usario de la tabla usuario en vase a su id_usuario
                                        if (isset($_GET['eliminar'])) {
                                          $idExM2=$_GET['id_historia'];
                                          $sql2 = "DELETE FROM Historial WHERE Id_Historia ='$idExM2'";
                                          echo $sql2;
                                          $result = $conn->query($sql2);
                                        }

                                        if (isset($_POST['actualizar'])){
                                          $Paciente = $_POST['Paciente'];
                                          $Informacion = $_POST['txtInformacion'];
                                          $Alergias = $_POST['txtAlergias'];
                                          $Antecedentes = $_POST['txtAntecendentes'];
                                          $Altura = $_POST['numAltura'];
                                          $Peso = $_POST['numPeso'];
                                          $idExM =$_POST['id_historia'];
                                          $sql4 = "UPDATE Historial SET Paciente='$Paciente',
                                          Informacion='$Informacion', Alergias='$Alergias',
                                          Antecedentes= '$Antecedentes', Altura = $Altura,
                                          Peso = $Peso
                                          WHERE Id_Historia = $idExM";
                                          $conn->query($sql4);
                                        }

                                        //Insertar un nuevo Usuario
                                        if(isset($_POST['alta'])){
                                          $Paciente = $_POST['Paciente'];
                                          $Informacion = $_POST['txtInformacion'];
                                          $Alergias = $_POST['txtAlergias'];
                                          $Antecedentes = $_POST['txtAntecendentes'];
                                          $Altura = $_POST['numAltura'];
                                          $Peso = $_POST['numPeso'];

                                          $sql3 = "INSERT INTO Historial(Id_Historia, Id_Paciente , Informacion, Alergias, Antecedentes, Altura, Peso)
                                          VALUES(0, '$Paciente', '$Informacion', '$Alergias', '$Antecedentes', 'Altura', 'Peso')";
                                          $conn->query($sql3);
                                        }

                                        $sql = "SELECT HIS.Id_Historia, CONCAT(PAC.Nombre, ' ', PAC.Apellidos) as Nombre  , HIS.Informacion, HIS.Altura, HIS.Peso
                                        FROM Historial AS HIS
                                        JOIN Paciente AS PAC
                                        ON HIS.Id_Paciente = PAC.Id_Paciente";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                                         ?>
                                        <tr>
                                            <td><?php  echo $row['Id_Historia'] ?></td>
                                            <td><?php  echo $row['Nombre']; ?></td>
                                            <td><?php  echo $row['Informacion'] ?></td>
                                            <td><?php  echo $row['Altura'] ?></td>
                                            <td><?php  echo $row['Peso'] ?></td>
                                            <td><a href="../proyecto/crudEMedicos.php?actualizar&id_historia=<?php echo $row['Id_Historia'] ?>">Actualizar</a> </td>
                                            <td><a href="../proyecto/crudEMedicos.php?id_historia=<?php echo $row['Id_Historia'].'&eliminar=1' ?>">Eliminar</a> </td>
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
                    <?php include "altaModificacionEMedicos.php" ?>

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
