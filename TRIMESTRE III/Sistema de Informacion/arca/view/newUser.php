<?php
require_once '../model/modelAdmin.php';
require_once '../conexion/conexion.php';
$rol = intval($_POST['rol-user-new']);
$tDoc = $_POST['tipo-docume-user-new'];
$doc = intval($_POST['number-doc-user-new']);
$pName = $_POST['p-name-user-new'];
$sName = $_POST['s-name-user-new'];
$pLastName = $_POST['p-lasname-user-new'];
$fechaN = $_POST['fechaNacimiento_U'];
$sLastName = $_POST['s-lasname-user-new'];
$email = $_POST['email-user-new'];
$number = intval($_POST['cel-user-new']);

$db = database::conectar();
$crud = new crudAdmin();
$crud -> newUser($tDoc, $doc, $pName, $sName, $pLastName, $sLastName, $email, $number, $rol, $fechaN);
?>
