<?php
require_once '../model/modelCitas.php';

$fechaC = $_POST['fecha_hora_cita'];
$crud = new crudCitas();
$crud -> editarCita($fechaC);
?> 