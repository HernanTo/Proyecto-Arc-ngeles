<?php
require_once ("./data_conexion.php");
include ("./neg_U_inhabilitar.php");

$tdd = 'CE';
$docUser = 1018726753;

$user = new usuario();
$user -> inhabilitarUser($tdd, $docUser, $db);
echo "<script> alert('Modicaste el estado del usuario $docUser') </script>";
?>