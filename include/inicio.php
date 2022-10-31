<?php

require("../connection/connection.php");
session_start();





$usuario=$_POST['usuario'];
$clave=$_POST['clave'];









$sentencia="SELECT * FROM usuarios, roles WHERE user=:id and usuarios.id_rol=roles.id_rol";
$select=$bd->prepare($sentencia);
$select->execute(array(":id"=>$usuario)); 

$filas=$select->rowCount(); 


if ($les=$select->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($clave, $les['clave'])) {
                
                $id=      $les['id_usu'];
                $usu=     $les['usuarios'];
                $con=     $les['clave'];
                $nombre=  $les['nombre_usu'];
                $apellido= $les['apel_usu'];
                $add=  $les['id_rol'];
                $tip=      $les['nombre_rol'];
                
                /* Variables globales */

                $_SESSION['doc']=$id;
                $_SESSION['usu']=$usu;
                $_SESSION['cla']=$con;
                $_SESSION['nomb']=$nombre;
                $_SESSION['apel']=$apellido;
                $_SESSION['rol']=$add;
                $_SESSION['tip']=$tip;


                
        }
        
       /* Comprobando si el número de filas devueltas por la consulta es mayor que 0. */
        if ($filas>0) {

                if ($les["id_rol"]==1) {
                        header("location:../admi/admi.php");
                }
                if ($les["id_rol"]==2) {
                        header("location:../buscar/index.php");
                }

        
        
          }else {
          echo "Error en la autenticacion";
          }
}





?>
