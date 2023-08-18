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

    $idLaboratorioModificar = $_GET['id_laboratorio'];
    $sql4 = "SELECT * FROM Laboratorio WHERE Id_Laboratorio= $idLaboratorioModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Laboratorio</h2></div>
  <form action="../proyecto/crudlaboratorio.php" method="post">
    <div class="mb-3 mt-3">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" id="text" placeholder="Introduce el nombre del laboratorio" name="txtNombre"
      value ="<?php echo $row['Laboratorio'];?>">
    </div>
    <input type ="hidden" name="id_laboratorio" value="<?php echo $idLaboratorioModificar?>">
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
  <h2>Alta de Laboratorio</h2> </div>
  <form action="../proyecto/crudlaboratorio.php" method="post">
     <div class="mb-3 mt-3">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" id="text" placeholder="Introduce el nombre del laboratorio" name="txtNombre">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
