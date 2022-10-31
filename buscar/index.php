
<!DOCTYPE html>
<html lang="en">
<head>
  <title>busqueda de empleados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/buscar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Busqueda de empleados</h2><
  <a href="cerrar.php"><button type="submit" class="cerrar" value="cerrar">cerrar</button></a>
  <form action="" method="GET">
    <div class="form-group">
      <br><br>
      <h4 for="email">Buscar:</h4>
      <input type="text" name="documento" placeholder="Ingrese la identificación del empleado" required>
    </div>
    <button type="submit" class="boton">Consultar</button><br><br><br>
  </form>
</div>

<?php
    

    if($_GET){
        require("../connection/connection.php");
        $id = $_GET['documento'];

        $sql= "SELECT nombre_empleado, apellido_empleado, correo, telefono FROM empleado WHERE id_empleado = :doc " ;
        $stmt = $bd->prepare($sql);
        $resul = $stmt->execute(array(':doc'=>$id));
        $rows= $stmt->fetchAll(\PDO::FETCH_OBJ);

        if(count($rows)){
            
            foreach($rows AS $row){
?>
            <div class="informacion">
                <div class="panel-heading"><h4>INFORMACIÓN DEL EMPLEADO</h4></div>
                    <div class="empleado">Documento:  <?php print($id) ?><br><br> Nombre: <?php print($row->nombre_empleado) ?> <br><br>
                    Apellido: <?php print($row->apellido_empleado) ?> <br><br> Correo Electronico: <?php print ($row->correo) ?> <br><br>
                    Telefono: <?php print($row->telefono)?>
            
                </div>
                <a href="cotizar.php?id=<?php echo $id ?> &nomb= <?php echo $row->nombre_empleado ?> &apel= <?php echo $row->apellido_empleado ?>"><input type="submit" value="Empezar" id="empezar"></a>
            </div>
<?php
            }

        }else{
            echo "El trabajador no  se encontro .";
        }
    }
?>


</body>
</html>

