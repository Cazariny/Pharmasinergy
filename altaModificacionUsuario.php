<?php
   if (isset($_GET['actualizar'])){

    $idUsuarioModificar = $_GET['id_usuario'];
    $sql4 = "SELECT * FROM usuario WHERE Id_Usuario= $idUsuarioModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modifica">
  <h2>Modificacion de Usuario</h2></div>
  <form action="../proyecto/crudUsuario.php" method="post">
    <div class="mb-3 mt-3">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" id="text" placeholder="Introduce tu nombre" name="txtUsuario"
      value ="<?php echo $row['Nombre'];?>">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Introduce tu password"
       name="pswUsuario"
       value ="<?php echo $row['Password'];?>">
    </div>
    <div class="mb-3">
      <label for="pwd">Rol:</label>
      <input type="number" class="form-control" id="rol" placeholder="Introduce tu rol" name="nmbRol" value ="<?php echo $row['Rol'];?>">
    </div>
    <input type ="hidden" name="id_usuario" value="<?php echo $idUsuarioModificar?>">
    <input type ="hidden" name="modificacion" value="1">
    <button type="submit" class="btn btn-primary">Modificar</button>
  </form>
</div>
<?php
   }
}else{
?>
<div class="container mt-3">
  <div id="alta">
  <h2>Alta de Usuario</h2> </div>
  <form action="../proyecto/crudUsuario.php" method="post">
     <div class="mb-3 mt-3">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" id="text" placeholder="Introduce tu nombre" name="txtUsuario">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Introduce tu password" name="pswUsuario">
    </div>
    <div class="mb-3">
      <label for="pwd">Rol:</label>
      <input type="number" class="form-control" id="rol" placeholder="Introduce tu rol" name="nmbRol">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="subir">Agregar</button>
  </form>
</div>
<?php } ?>
