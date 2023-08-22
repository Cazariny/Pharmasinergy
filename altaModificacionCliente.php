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

    $idClienteModificar = $_GET['id_cliente'];
    $sql4 = "SELECT * FROM Cliente WHERE Id_Cliente= $idClienteModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Clientes</h2></div>
  <form action="../proyecto/crudClientes.php" method="post">
    <div class="mb-3 mt-3">
      <label for="numPaciente">Selecciona al Paciente:</label>
      <select class="form-control" name="numPaciente" onchange="selectDatos(event)">
        <option disabled selected> Selecciona el Paciente</option>
        <?php
        $sql6 = "SELECT * FROM Paciente";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row2 = $result6->fetch_assoc()){
         ?>
         <option nombre =" <?php echo $row2['Nombre']?>"
           apellido = "<?php echo $row2['Apellidos']?>"
           direccion =" <?php echo $row2['Direccion']?>"
         value="<?php echo $row2['Id_Paciente'] ?>"><?php echo $row2['Nombre']?> <?php echo $row2['Apellidos']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF
          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Cliente" placeholder="Introduce el nombre del cliente"
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
      <label for="Nombre">RFC:</label>
      <input type="text" class="form-control" id="RFC" placeholder="Introduce el RFC"
       name="txtRFC"
       value ="<?php echo $row['RFC'];?>">
    </div>
    <div class="mb-3">
      <label for="Direccion">Direccion:</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Introduce la Direccion"
       name="txtDireccion"
       value ="<?php echo $row['Direccion'];?>">
    </div>
    <input type ="hidden" name="id_cliente" value="<?php echo $idClienteModificar?>">
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
  <h2>Alta de Clientes</h2> </div>
  <form action="../proyecto/crudClientes.php" method="post">
    <div class="mb-3 mt-3">
      <label for="numPaciente">Selecciona al Paciente:</label>
      <select class="form-control" name="numPaciente" onchange="selectDatos(event)">
        <option disabled selected> Selecciona el Paciente</option>
        <?php
        $sql6 = "SELECT * FROM Paciente";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row2 = $result6->fetch_assoc()){
         ?>
         <option nombre =" <?php echo $row2['Nombre']?>"
           apellido = "<?php echo $row2['Apellidos']?>"
           direccion =" <?php echo $row2['Direccion']?>"
         value="<?php echo $row2['Id_Paciente'] ?>"><?php echo $row2['Nombre']?> <?php echo $row2['Apellidos']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF
          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Cliente" placeholder="Introduce el nombre del cliente"
       name="txtNombre">
    </div>
    <div class="mb-3">
      <label for="Nombre">Apellido:</label>
      <input type="text" class="form-control" id="Apellido" placeholder="Introduce el Apellido"
       name="txtApellido"
    </div>
    <div class="mb-3">
      <label for="Nombre">RFC:</label>
      <input type="text" class="form-control" id="RFC" placeholder="Introduce el RFC"
       name="txtRFC">
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
