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

    $idOrdenModificar = $_GET['id_orden'];
    $sql4 = "SELECT * FROM Ordenes WHERE Id_Orden= $idOrdenModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Ordenes</h2></div>
  <form action="../proyecto/crudOrdenes.php" method="post">
    <div class="mb-3">
      <label for="Cliente">Cliente:</label>
      <select class="form-control" name="Cliente">
        <option disabled selected> Selecciona el Cliente</option>
        <?php
        $sql5 = "SELECT Id_Cliente, CONCAT(Nombre, ' ', Apellido) as Nombre FROM Cliente";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
          while($row1 = $result5->fetch_assoc()){
         ?>
         <option value="<?php echo $row1['Id_Cliente'] ?>"><?php echo $row1['Nombre']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <div class="mb-3">
      <label for="Fecha">Fecha:</label>
      <input type="date" class="form-control" id="Descripcion" placeholder="Fecha"
       name="Fecha">
    </div>
    <!-- <div class="mb-3">
      <label for="Total">Total</label>
      <input type="number" class="form-control" id="UMedida" placeholder="Introduce el Total"
       name="numTotal">
    </div> -->
    <div class="mb-3">
      <label for="consulta">Consulta:</label>
      <select class="form-control" name="consulta">
        <option disabled selected> Selecciona la Consulta</option>
        <?php
        $sql6 = "SELECT * FROM Consulta";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row2 = $result6->fetch_assoc()){
         ?>
         <option value="<?php echo $row2['Id_Consulta'] ?>"><?php echo $row2['Id_Paciente']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <input type ="hidden" name="id_orden" value="<?php echo $idOrdenModificar?>">
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
  <h2>Alta de Ordenes</h2> </div>
  <form action="../proyecto/crudOrdenes.php" method="post">
    <div class="mb-3">
      <label for="Cliente">Cliente:</label>
      <select class="form-control" name="Cliente">
        <option disabled selected> Selecciona el Cliente</option>
        <?php
        $sql5 = "SELECT Id_Cliente, CONCAT(Nombre, ' ', Apellido) as Nombre FROM Cliente";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
          while($row1 = $result5->fetch_assoc()){
            ?>
         <option value="<?php echo $row1['Id_Cliente'] ?>"><?php echo $row1['Nombre']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF
     ?>
        </select>
    </div>
    <div class="mb-3">
      <label for="Fecha">Fecha:</label>
      <input type="date" class="form-control" id="Descripcion" placeholder="Fecha"
       name="Fecha">
    </div>
    <!-- <div class="mb-3">
      <label for="Total">Total</label>
      <input type="number" class="form-control" id="UMedida" placeholder="Introduce el Total"
       name="numTotal">
    </div> -->
    <div class="mb-3">
      <label for="consulta">Consulta:</label>
      <select class="form-control" name="consulta">
        <option disabled selected> Selecciona la Consulta</option>
        <?php
        $sql6 = "SELECT * FROM Consulta";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row2 = $result6->fetch_assoc()){
         ?>
         <option value="<?php echo $row2['Id_Consulta'] ?>"><?php echo $row2['Id_Paciente']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
