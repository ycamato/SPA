<?php
    session_start();
    require("../connection/connection.php");
    $idu=$_SESSION['doc'];

    $id = $_GET['id'];
    $nomb= $_GET['nombre'];
    $apel = $_GET['apellido'];
    $salario=$_GET['sueldo'];
    $dias=$_GET['dias'];

   

    $sueldo = ($salario / 30) * $dias;

    $pension= $sueldo * 0.04;

    $salud= $sueldo * 0.04;

    $descuento= $pension + $salud;

    $subtot= $sueldo - $descuento;

    
    
    if ($sueldo <= 2000000) {
        $aux= 117172;
        $aux_dias=($aux / 30) * $dias;

        $sql1="INSERT INTO nomina(id_usu, id_empleado, sueldo_devengado, dias_trabajo, pension, salud, auxilio_transporte,total, neto_pagar) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $resultado=$bd->prepare($sql1);//$base es el nombre de la conexión
        $resultado->execute(array($idu,$id,$sueldo,$dias,$pension,$salud,$aux_dias,$salario, $subtot));
        echo"<script>alert('Registro Exitoso')</script>";
        //echo"<script>window.location='index.php'</script>";
    }else{
        $auxi= 0;
        $aux_dias=($auxi / 30) * $dias;
        
        $sql1="INSERT INTO nomina (id_usu, id_empleado, sueldo_devengado, dias_trabajo, pension, salud, auxilio_transporte,total) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $resultado=$bd->prepare($sql1);//$base es el nombre de la conexión
        $resultado->execute(array($idu,$id,$sueldo,$dias,$pension,$salud,$auxi));
        echo"<script>alert('Registro Exitoso')</script>";
        //echo"<script>window.location='index.php'</script>";
    }
    

?>