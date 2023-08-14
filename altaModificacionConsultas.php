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

    $idProductoModificar = $_GET['Id_Producto'];
    $sql4 = "SELECT * FROM Producto WHERE Id_Producto= $idProductoModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Productos</h2></div>
  <form action="../proyecto/crudProductos.php" method="post">
    <div class="mb-3 mt-3">
      <label for="checkbox">Es Medicamento ?:</label>
      <input type="checkbox" class="form-control" id="checkbox"  name="checkMedicamento"
      value ="<?php echo $row['EsMedicamento'];?>">
    </div>
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Producto" placeholder="Introduce el nombre del producto"
       name="txtProducto"
       value ="<?php echo $row['Nombre'];?>">
    </div>
    <div class="mb-3">
      <label for="Nombre">Descripcion:</label>
      <input type="text" class="form-control" id="Descripcion" placeholder="Introduce el nombre del producto"
       name="txtDescripcion"
       value ="<?php echo $row['Descripcion'];?>">
    </div>
    <div class="mb-3">
      <label for="Marca">Marca:</label>
      <select class="form-control" name="Marca">


      </select>
    </div>
    <div class="mb-3">
      <label for="UMedida">Unidad de Medida:</label>
      <input type="number" class="form-control" id="UMedida" placeholder="Introduce la Unidad de Medida"
       name="txtUMedida"
       value ="<?php echo $row['UnidadMedida'];?>">
    </div>
    <div class="mb-3">
      <label for="CostDir">Costo Directo:</label>
      <input type="number" class="form-control" id="CostDir" placeholder="Introduce el Costo de compra"
       name="numCostDir"
       value ="<?php echo $row['CostoDirecto'];?>">
    </div>
    <div class="mb-3">
      <label for="Precio">Precio:</label>
      <input type="number" class="form-control" id="Precio" placeholder="Introduce el Precio de Venta"
       name="numPrecio"
       value ="<?php echo $row['Precio'];?>">
    </div>
    <div class="mb-3">
      <label for="Exist">Existencia:</label>
      <input type="number" class="form-control" id="Exist" placeholder="Introduce el numero de Existencia"
       name="numExist"
       value ="<?php echo $row['Existencia'];?>">
    </div>
    <div class="mb-3">
      <label for="PReorden">Punto de Reorden:</label>
      <input type="number" class="form-control" id="PReorden" placeholder="Introduce el Punto de Reorden"
       name="numPReorden"
       value ="<?php echo $row['PuntoReorden'];?>">
    </div>
    <input type ="hidden" name="id_producto" value="<?php echo $idProductoModificar?>">
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
  <h2>Alta de Producto</h2> </div>
  <form action="../proyecto/crudProductos.php" method="post">
    <div class="mb-3 mt-3">
      <label for="checkbox">Es Medicamento ?:</label>
      <input type="checkbox" class="form-control" id="checkbox"  name="checkMedicamento">
    </div>
    <div class="mb-3">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nom_Producto" placeholder="Introduce el nombre del producto"
       name="txtProducto">
    </div>
    <div class="mb-3">
      <label for="Nombre">Descripcion:</label>
      <input type="text" class="form-control" id="Descripcion" placeholder="Introduce el nombre del producto"
       name="txtDescripcion">
    </div>
    <div class="mb-3">
      <label for="Marca">Marca:</label>
      <select class="form-control" name="Marca">


      </select>
    </div>
    <div class="mb-3">
      <label for="UMedida">Unidad de Medida:</label>
      <input type="number" class="form-control" id="UMedida" placeholder="Introduce la Unidad de Medida"
       name="txtUMedida">
    </div>
    <div class="mb-3">
      <label for="CostDir">Costo Directo:</label>
      <input type="number" class="form-control" id="CostDir" placeholder="Introduce el Costo de compra"
       name="numCostDir">
    </div>
    <div class="mb-3">
      <label for="Precio">Precio:</label>
      <input type="number" class="form-control" id="Precio" placeholder="Introduce el Precio de Venta"
       name="numPrecio">
    </div>
    <div class="mb-3">
      <label for="Exist">Existencia:</label>
      <input type="number" class="form-control" id="Exist" placeholder="Introduce el numero de Existencia"
       name="numExist">
    </div>
    <div class="mb-3">
      <label for="PReorden">Punto de Reorden:</label>
      <input type="number" class="form-control" id="PReorden" placeholder="Introduce el Punto de Reorden"
       name="numPReorden">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
