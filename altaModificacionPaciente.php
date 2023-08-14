<?php

// $var= $_GET['actualizar'];
// echo "var". $var;
//    if (isset($_GET['actualizar'])){
//      echo "entre";
//    }else{
//      echo "no entre a actualizar";
//    }
//
//

   if (isset($_GET['actualizar'])){

    $idPacienteModificar = $_GET['id_paciente'];
    $sql4 = "SELECT * FROM Paciente WHERE Id_Paciente= $idPacienteModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Clientes</h2></div>
  <form action="../proyecto/crudClientes.php" method="post">
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Paciente" placeholder="Introduce el nombre del cliente"
       name="txtNombre"
       value ="<?php echo $row['Nombre'];?>">
    </div>
    <div class="mb-3">
      <label for="Nombre">Apellido:</label>
      <input type="text" class="form-control" id="Apellido" placeholder="Introduce el Apellido"
       name="txtApellido"
       value ="<?php echo $row['Apellidos'];?>">
    </div>
    <div class="mb-3">
      <label for="Nombre">Edad:</label>
      <input type="number" class="form-control" id="Edad" placeholder="Introduce el RFC"
       name="numEdad"
       value ="<?php echo $row['Edad'];?>">
    </div>
    <div class="mb-3">
      <label for="Direccion">Direccion:</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Introduce la Direccion"
       name="txtDireccion"
       value ="<?php echo $row['Direccion'];?>">
    </div>
    <input type ="hidden" name="id_paciente" value="<?php echo $idPacienteModificar?>">
    <input type ="hidden" name="actualizar" value="1">
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>
<?php
   }
}else{
?>
<div class="container mt-3">
  <div id="alta">
  <h2>Alta de Pacientes</h2> </div>
  <form action="../proyecto/crudClientes.php" method="post">
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Paciente" placeholder="Introduce el nombre del Paciente"
       name="txtNombre">
    </div>
    <div class="mb-3">
      <label for="Nombre">Apellido:</label>
      <input type="text" class="form-control" id="Apellidos" placeholder="Introduce los Apellidos"
       name="txtApellido"
    </div>
    <div class="mb-3">
      <label for="Nombre">Edad:</label>
      <input type="number" class="form-control" id="Edad" placeholder="Introduce La Edad"
       name="numEdad">
    </div>
    <div class="mb-3">
      <label for="Direccion">Direccion:</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Introduce la Direccion"
       name="txtDireccion">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
