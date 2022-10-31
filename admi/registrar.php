<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/registrar.css">
    <title>Registrar</title>
</head>
<header>
    
    <nav>
        <ul>
            <li><a href="admi.php">Inicio</a></li>
            <li><a href="registrar.php">Registrar</a></li>
            <li><a href="../index.php">Salir</a></li>
            <li></li>
        </ul>
    </nav>
</header>
<body>
    <?php
    
    include("../connection/connection.php");

    
    //--------------paginación-------------
    $registros=3;//indica que se van a ver 3 registro por página
    if(isset($_GET["pagina"])){
        if($_GET["pagina"]==1){
            header("Location:registrar.php");
        }else{
            $pagina=$_GET["pagina"];
        }
    }else{
        $pagina=1;//muestra página en la que estamos cuando se carga por primera vez
    }
    
    $empieza=($pagina-1)*$registros;//registro desde el cual va a empezar a mostrar
    $sql_total="SELECT * FROM empleado";//muestra los 3 primeros, primer parametro indica en que posición impieza en este caso posición 0, el segundo parametro cuantos registros quiere mostrar en este caso 3 registros

    $resultado=$bd->prepare($sql_total);

    $resultado->execute(array());
    $numfilas=$resultado->rowCount();//cuantos registros hay en total
    $totalpagina=ceil($numfilas/$registros);

    $registros=$bd->query("SELECT * from empleado LIMIT $empieza, $registros")->fetchALL(PDO::FETCH_OBJ);
    
    if(isset($_POST['inserta'])){
        $idu=$_POST['idu'];
        $nombre=$_POST['nomb'];
        $apellido=$_POST['apel'];
        $correo=$_POST['correo'];
        $telefono=$_POST['telefono'];
    
        ?>
        <input type="number" name="idd" value="<?php echo $idu?>">
        <?php 
        $sql="INSERT INTO empleado (id_empleado, nombre_empleado, apellido_empleado, correo, telefono) values (:id,:nom, :ape, :corre, :tel)";
        $resultado=$bd->prepare($sql);//$base es el nombre de la conexión
        $resultado->execute(array(":id"=>$idu,  ":nom"=>$nombre, ":ape"=>$apellido, ":corre"=>$correo, "tel"=>$telefono));

        echo"<script>alert('Se registro el usuario')</script>";
        echo"<script>window.location='registrar.php'</script>";
    
        
    }

    ?>
    
<h3 align="center">REGISTRAR CLIENTES</h3>
<form action=" " method="post" autocomplete="off">
        <table border="2">
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                
            </tr>
            <?php
            //por cada objeto que hay dentro del array repite el código
            foreach ($registros as $usuario) :?> 
            
            
            
                    
            
            

            
            <?php
            endforeach;
        
            ?>
            
            <td><input type="number" name="idu" required></td>
            <td><input type="text" name="nomb" required></td>
            <td><input type="text" name="apel" required></td>
            <td><input type="email" name="correo" required></td>
            <td><input type="number" name="telefono" required></td>
    


                </select> </td>
                <td colspan="5" align="center"><input  type="submit" class="insertar" name="inserta" value="Insertar" >
            </tr>
        
            
    </tr>
                
                
    
        </table>
</form>


        
<?php
    
$base=null;//vaciar los datos de conexión 

?>
