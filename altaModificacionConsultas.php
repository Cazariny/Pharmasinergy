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

    $idConsultaModificar = $_GET['id_consulta'];
    $sql4 = "SELECT * FROM Consulta WHERE Id_Consulta= $idConsultaModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();
?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Consulta</h2></div>
  <form action="../proyecto/crudConsultas.php" method="post">
    <div class="mb-3">
      <label for="Paciente">Paciente:</label>
      <select class="form-control" name="Paciente">
        <option value="0"> Selecciona el Paciente</option>
        <?php
        $sql5 = "SELECT * FROM Paciente";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
          while($row1 = $result5->fetch_assoc()){
         ?>
         <option value="<?php echo $row1['Id_Paciente'] ?>"><?php echo $row1['Nombre']?> <?php echo $row1['Apellidos']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF
          ?>
      </select>
  </div>
  <div class="mb-3">
    <label for="Doctor">Doctor:</label>
    <select class="form-control" name="Doctor">
      <option value="0"> Selecciona el Doctor</option>
      <?php
      $sql6 = "SELECT * FROM Doctores";
      $result6 = $conn->query($sql6);
      if ($result6->num_rows > 0) {
        while($row2 = $result6->fetch_assoc()){
       ?>
       <option value="<?php echo $row2['Id_Doctor'] ?>"><?php echo $row2['Nombre']?> <?php echo $row2['Apellido']  ?></option>
       <?php
     }//Cierre While
   }// Cierre IF
        ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="Fecha">Fecha:</label>
    <input type="date" class="form-control" id="Fecha" placeholder="Introduce la Fecha"
     name="Fecha" value=" <?php echo $row['Fecha'] ?>">
  </div>
  <div class="mb-3">
    <label for="Motivo">Motivo:</label><br>
    <textarea id="Motivo" name="txtMotivo" rows="8" cols="80" >
      <?php echo $row['Motivo'];?>
    </textarea>
  </div>
  <div class="mb-3">
    <label for="Diagnostico">Diagnostico:</label><br>
    <textarea id="Diagnostico" name="txtDiagnostico" rows="8" cols="80" >
      <?php echo $row['Diagnostico'];?>
    </textarea>
  </div>
  <div class="mb-3">
    <label for="Tratamiento">Tratamiento:</label><br>
    <textarea id="Tratamiento" name="txtTratamiento" rows="8" cols="80" >
      <?php echo $row['Tratamiento'];?>
    </textarea>
  </div>
    <input type ="hidden" name="id_consulta" value="<?php echo $idConsultaModificar?>">
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
  <h2>Alta de Consultas</h2> </div>
  <form action="../proyecto/crudConsultas.php" method="post">
    <div class="mb-3">
      <label for="Paciente">Paciente:</label>
      <select class="form-control" name="Paciente">
        <option value="0"> Selecciona el Paciente</option>
        <?php
        $sql5 = "SELECT * FROM Paciente";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
          while($row = $result5->fetch_assoc()){
         ?>
         <option value="<?php echo $row['Id_Paciente'] ?>"><?php echo $row['Nombre']?> <?php echo $row['Apellidos']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <div class="mb-3">
      <label for="Doctor">Doctor:</label>
      <select class="form-control" name="Doctor">
        <option value="0"> Selecciona el Doctor</option>
        <?php
        $sql6 = "SELECT * FROM Doctores";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          while($row = $result6->fetch_assoc()){
         ?>
         <option value="<?php echo $row['Id_Doctor'] ?>"><?php echo $row['Nombre']?> <?php echo $row['Apellido']  ?></option>
         <?php
       }//Cierre While
     }// Cierre IF

          ?>
        </select>
    </div>
    <div class="mb-3">
      <label for="Fecha">Altura:</label>
      <input type="date" class="form-control" id="Fecha" placeholder="Introduce la Fecha"
       name="Fecha">
    </div>
    <div class="mb-3">
      <label for="Motivo">Motivo:</label><br>
      <textarea id="Motivo" name="txtMotivo" rows="8" cols="80" >

      </textarea>
    </div>
    <div class="mb-3">
      <label for="Diagnostico">Diagnostico:</label><br>
      <textarea id="Diagnostico" name="txtDiagnostico" rows="8" cols="80" >

      </textarea>
    </div>
    <div class="mb-3">
      <label for="Tratamiento">Tratamiento:</label><br>
      <textarea id="Tratamiento" name="txtTratamiento" rows="8" cols="80" >

      </textarea>
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
