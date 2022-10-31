<?php
       session_start();
       require("../connection/connection.php");

      

      $id = $_GET['id'];
      $nomb= $_GET['nomb'];
      $apel = $_GET['apel'];
      







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cotizar.css">
    <title>Cotizar</title>
</head>
<body>
    <form method="GET" action="detalle.php" id="formulario">
    <div>
        <h1>Generar Cotizacion</h1><br>
        <input class="doc" type="text"  name="id" value="<?php echo $id ?>" readonly>
        <input class="nom" type="text" name="nombre" value="<?php echo $nomb ?>" readonly>
        <input class="apel" type="text" name="apellido" value="<?php echo $apel ?>" readonly>
        <input class="sueld" type="text" id="sueldo" name="sueldo" placeholder="Sueldo (1 Millon Max)" required>
        <input class="dias" type="text" id="dias" name="dias" placeholder="Ingresa dias trabajados" required>
        <a href="detalle.php?id= <?php $id ?> &nomb=  <?php $nomb ?> &apel= <?php $apel ?>"><input type="submit"  class="boton" name="verificar" value="verificar"></a>
    </div>


    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);});

function validarFormulario(evento) {
  evento.preventDefault();
  var sueldo = document.getElementById('sueldo').value;
  if(sueldo < 1000000) {
    alert('Este sueldo no es permitido ingresar');
    return;
  }
  var dias = document.getElementById('dias').value;
  if (dias > 31) {
    alert('Los dias ingresados no son aceptados');
    return;
  }
  this.submit();
  
}

   
    </script>

</body>
</html>
