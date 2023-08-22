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

    $idMedicamentoModificar = $_GET['id_medicamento'];
    $sql4 = "SELECT * FROM Medicamento WHERE Id_Medicamento= $idMedicamentoModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Medicamentos</h2></div>
  <form action="../proyecto/crudMedicamentos.php" method="post">
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Producto" placeholder="Introduce el nombre del Medicamento"
       name="txtNombre" value ="<?php echo $row['Nombre'];?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="Laboratorio">Laboratorio:</label>
      <select class="form-control" name="laboratorio">
        <option > Selecciona el Laboratorio</option>
        <?php
        $sql6 = "SELECT * FROM Laboratorio";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row1 = $result6->fetch_assoc()){
         ?>
         <option value="<?php echo $row1['Id_Laboratorio'] ?>"><?php echo $row1['Laboratorio']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="PActivo">Principio Activo:</label>
      <input type="text" class="form-control" id="PActivo" placeholder="Introduce el Principio Activo"
       name="txtPActivo"
       value ="<?php echo $row['PrincipioActivo'];?>">
    </div>
    <div class="mb-3">
      <label for="IsGenerico">Es Generico ?:</label>
      <input type="checkbox" class="form-control" id="IsGenerico" placeholder="Introduce el Costo de compra"
       name="checkgenerico"
       value ="1">
       <label for="IsGenerico">Es Patente ?:</label>
       <input type="checkbox" class="form-control" id="IsGenerico" placeholder="Introduce el Costo de compra"
        name="checkgenerico"
        value ="0">
    </div>
    <input type ="hidden" name="id_medicamento" value="<?php echo $idMedicamentoModificar?>">
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
  <h2>Alta de Medicamentos</h2> </div>
  <form action="../proyecto/crudMedicamentos.php" method="post">
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Producto" placeholder="Introduce el nombre del Medicamento"
       name="txtNombre">
    </div>
    <div class="mb-3 mt-3">
      <label for="Id_Laboratorio">Laboratorio:</label>
      <select class="form-control" name="laboratorio">
        <option > Selecciona el Laboratorio</option>
        <?php
        $sql6 = "SELECT * FROM Laboratorio";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row = $result6->fetch_assoc()){
         ?>
         <option value="<?php echo $row['Id_Laboratorio'] ?>"><?php echo $row['Laboratorio']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="PActivo">Principio Activo:</label>
      <input type="text" class="form-control" id="PActivo" placeholder="Introduce el Principio Activo"
       name="txtPActivo">
    </div>
    <div class="mb-3">
      <label for="IsGenerico">Es Generico ?:</label>
      <input type="checkbox" class="form-control" id="IsGenerico" placeholder="Introduce el Costo de compra"
       name="checkgenerico"
       value ="1">
       <label for="IsGenerico">Es Patente ?:</label>
       <input type="checkbox" class="form-control" id="IsGenerico" placeholder="Introduce el Costo de compra"
        name="checkgenerico"
        value ="0">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
