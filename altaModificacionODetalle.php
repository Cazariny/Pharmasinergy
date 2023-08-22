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
    $idOrden = $_GET['id_orden'];
    $idODetalleModificar = $_GET['id_odetalle'];
    $sql4 = "SELECT * FROM OrdenDetalle WHERE Id_ODetalle= $idODetalleModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Detalle de Orden</h2></div>
  <form action="../proyecto/crudOrdenDetalle.php?detalle&id_orden=<?php echo $idOrden?>" method="post">
    <div class="mb-3">
      <label for="Cliente">Producto:</label>
      <select class="form-control" name="Producto" onchange="llenarPrecio(event)">
        <option disabled selected> Selecciona el Producto</option>
        <?php
        $sql5 = "SELECT * FROM Productos";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
          while($row1 = $result5->fetch_assoc()){
         ?>
         <option PU = "<?php echo $row1['Precio'] ?>"
         value="<?php echo $row1['Id_Producto'] ?>"><?php echo $row1['Nombre']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <div class="mb-3">
      <label for="Fecha">Cantidad:</label>
      <input type="number" class="form-control" id="Cantidad" placeholder="Cantidad de producto"
       name="numCantidad" value="<?php echo $row['Cantidad'] ?>">
    </div>
    <div class="mb-3">
      <label for="PU">Precio Unitario</label>
      <input type="number" class="form-control" id="PU" placeholder="Introduce el Precio por Unidad"
       name="numPU" value="<?php echo $row['PU'] ?>">
    </div>
    <!-- <div class="mb-3">
      <label for="Importe">Importe</label>
      <input type="number" class="form-control" id="Importe" placeholder="Introduce el Importe"
       name="Importe" >
    </div> -->
    <input type ="hidden" name="id_odetalle" value="<?php echo $idODetalleModificar?>">
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
  <h2>Alta de Detalles de Orden</h2> </div>
  <form action="../proyecto/crudOrdenDetalle.php?detalle&id_orden=<?php echo $row4['Id_Orden']?>" method="post">
    <div class="mb-3">
      <label for="Cliente">Producto:</label>
      <select class="form-control" name="Producto" onchange="llenarPrecio(event)">
        <option disabled selected> Selecciona el Producto</option>
        <?php
        $sql5 = "SELECT * FROM Productos";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
          while($row1 = $result5->fetch_assoc()){
         ?>
         <option PU = "<?php echo $row1['Precio'] ?>"
         value="<?php echo $row1['Id_Producto'] ?>"><?php echo $row1['Nombre']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <div class="mb-3">
      <label for="Fecha">Cantidad:</label>
      <input type="number" class="form-control" id="Cantidad" placeholder="Cantidad de producto"
       name="numCantidad" >
    </div>
    <div class="mb-3">
      <label for="PU">Precio Unitario</label>
      <input type="number" class="form-control" id="PU" placeholder="Introduce el Precio por Unidad"
       name="numPU" >
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
