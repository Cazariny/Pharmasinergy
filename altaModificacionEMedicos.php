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

    $idHistoriaModificar = $_GET['id_historia'];
    $sql4 = "SELECT * FROM Historial WHERE Id_Historia= $idHistoriaModificar";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();

?>
<div class="container mt-3">
    <div id="modificar">
  <h2>Modificacion de Historia Clinica</h2></div>
  <form action="../proyecto/crudEMedicos.php" method="post">
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
      <label for="Informacion">Informacion:</label><br>
      <textarea id="Informacion" name="txtInformacion" rows="8" cols="80" >
        <?php echo $row['Informacion'];?>
      </textarea>
    </div>
    <div class="mb-3">
      <label for="Alergias">Alergias:</label><br>
      <textarea id="Alergias" name="txtAlergias" rows="8" cols="80" >
        <?php echo $row['Alergias'];?>
      </textarea>
    </div>
    <div class="mb-3">
      <label for="Antecedentes">Antecedentes:</label><br>
      <textarea id="Antecedentes" name="txtAntecendentes" rows="8" cols="80" >
        <?php echo $row['Antecedentes'];?>
      </textarea>
    </div>
    <div class="mb-3">
      <label for="Altura">Altura:</label><br>
      <input type="number" class="form-control" id="Altura" placeholder="Introduce la Altura"
       name="numAltura"
       value ="<?php echo $row['Altura'];?>"
    </div>
    <div class="mb-3">
      <label for="Peso">Peso:</label>
      <input type="number" class="form-control" id="Peso" placeholder="Introduce el Peso"
       name="numPeso"
       value ="<?php echo $row['Peso'];?>"
    </div>
    <input type ="hidden" name="id_historia" value="<?php echo $idHistoriaModificar?>">
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
  <h2>Alta de Historia Medica</h2> </div>
  <form action="../proyecto/crudEMedicos.php" method="post">
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
      <label for="Informacion">Informacion:</label><br>
      <textarea id="Informacion" name="txtInformacion" rows="8" cols="80" >

      </textarea>
    </div>
    <div class="mb-3">
      <label for="Alergias">Alergias:</label><br>
      <textarea id="Alergias" name="txtAlergias" rows="8" cols="80" >

      </textarea>
    </div>
    <div class="mb-3">
      <label for="Antecedentes">Antecedentes:</label><br>
      <textarea id="Antecedentes" name="txtAntecendentes" rows="8" cols="80" >

      </textarea>
    </div>
    <div class="mb-3">
      <label for="Altura">Altura:</label>
      <input type="number" class="form-control" id="Altura" placeholder="Introduce la Altura"
       name="numAltura">
    </div>
    <div class="mb-3">
      <label for="Peso">Peso:</label>
      <input type="number" class="form-control" id="Peso" placeholder="Introduce el Peso"
       name="numPeso">
    </div>
    <input type ="hidden" name="alta" value="1">
    <button type="submit" class="btn btn-primary" name="alta">Agregar</button>
  </form>
</div>
<?php } ?>
