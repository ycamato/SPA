<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "nomina";
try{
	$bd = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	$bd->query("set names utf8;");
    $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>