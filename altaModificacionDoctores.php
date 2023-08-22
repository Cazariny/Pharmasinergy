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

    $idDoctorModificar = $_GET['id_doctor'];
    $sql4 = "SELECT * FROM Doctores WHERE Id_Doctor= $idDoctorModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Doctor</h2></div>
  <form action="../proyecto/crudDoctores.php" method="post">
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Doctor" placeholder="Introduce el nombre del Doctor"
       name="txtNombre"
       value ="<?php echo $row['Nombre'];?>">
    </div>
    <div class="mb-3">
      <label for="Nombre">Apellido:</label>
      <input type="text" class="form-control" id="Apellido" placeholder="Introduce el Apellido"
       name="txtApellido"
       value ="<?php echo $row['Apellido'];?>">
    </div>
    <div class="mb-3">
      <label for="Especialidad">Especialidad:</label>
      <input type="text" class="form-control" id="Edad" placeholder="Introduce la Especialidad"
       name="txtEspecialidad"
       value ="<?php echo $row['Especialidad'];?>">
    </div>
    <div class="mb-3">
      <label for="RFC">RFC:</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Introduce el RFC"
       name="txtRFC"
       value ="<?php echo $row['RFC'];?>">
    </div>
    <input type ="hidden" name="id_doctor" value="<?php echo $idDoctorModificar?>">
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
  <h2>Alta de Doctores</h2> </div>
  <form action="../proyecto/crudDoctores.php" method="post">
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Doctor" placeholder="Introduce el nombre del Doctor"
       name="txtNombre">
    </div>
    <div class="mb-3">
      <label for="Nombre">Apellido:</label>
      <input type="text" class="form-control" id="Apellido" placeholder="Introduce el Apellido"
       name="txtApellido">
    </div>
    <div class="mb-3">
      <label for="Especialidad">Especialidad:</label>
      <input type="text" class="form-control" id="Edad" placeholder="Introduce la Especialidad"
       name="txtEspecialidad">
    </div>
    <div class="mb-3">
      <label for="RFC">RFC:</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Introduce el RFC"
       name="txtRFC">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
