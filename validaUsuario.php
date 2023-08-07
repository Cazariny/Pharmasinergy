<?php
session_start();  //inicio de session de usuarios
if( $_SERVER['REQUEST_METHOD']== "POST"){ //lectura de controles
      $usuario= $_POST['txtUsuario'];
      $pass= $_POST['pswUsuario'];
     }else{
       $usuario= $_GET['txtUsuario'];
       $pass= $_GET['pswUsuario'];
     }
//echo "usuario: $usuario  y ´password: $pass";

    /* aqui vamos a meter la validación con la tabla de usuario*/
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="pharmasinergy";

    // Creando la conexion con Mysql
    $conn = new mysqli($servername, $username, $password,$dbname, 3307);

    // Verificando la conexion
    if ($conn->connect_error) {
        die("<br>Conexión fallida: " . $conn->connect_error);
    }else{
    echo "si me pude conectar!";
     $sql= "SELECT * FROM usuario WHERE Nombre='$usuario' AND Password ='$pass'";
     echo "sql = $sql";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
        echo "Encontramos al usuario en la BD";
        $row = $result->fetch_assoc();
        $_SESSION["autenticado"] ="si";
        $_SESSION["idUsuario"] =$row["Id_Usuario"] ;
        $_SESSION['usuarioAutenticado']= $row["Nombre"];
        $_SESSION['noRolUsuario']= $row["Rol"];
        if ($row["Rol"]==1){
           $_SESSION['rolUsuario']= "Administrador" ;
        }else if ($row["Rol"]==2) {
          $_SESSION['rolUsuario']= "Doctor";
        }else if ($row["Rol"]==3){
          $_SESSION['rolUsuario']= "Farmaceutico";
        }else if ($row["Rol"]==4){
          $_SESSION['rolUsuario']= "Cliente";
        }
        header("location:../proyecto/index.php");
      }else{
        echo "error";
        header("location:../proyecto/login.php?error=1");
      }
}
?>
