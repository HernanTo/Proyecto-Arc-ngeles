<?php
//incluye la clase vistasp y CrudPersona
require_once('crud.php'); //crud vistasp
require_once('persona.php');      //crud libro
$crud=new Crudvistasd();
$vistasd= new vistasd();
$crud1=new Crudvistasp();
$vistasp= new vistasp();
$crud2=new Crudvistaca();
$vistaca= new vistaca();

//obtiene todos las Personas con el método mostrar de la clase crud
$listavistasd=$crud->mostrar();
$listavistasp=$crud1->mostrar();
$listavistaca=$crud2->mostrar();

?>
 
<html>
<head>
	<title>Mostrar Personas</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/tabla.css" />
		<link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/secretary.css" />
        <link rel="stylesheet" href="assets/icons/css/uicons-solid-rounded.css">
        <link rel="shortcut icon" href="assets/img/Logos/Logo TEXT.svg">
   
</head>
<body>
 
<div class="con-panel-pacientes__cita">
              <h3>Datos de la cita:</h3>
        </div>
	   <table class="con-panel-pacientes__citaTabla">
       <thead >
	
            <Tr>
			<th>Especialista Nombres</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Tipo de cita</th>
			<th>Fecha y hora</th>
            </Tr>
		</thead>
		<tbody>
		<?php foreach ($listavistasd as $vistasd)  {?>
		<tr>
			<td><?php echo $vistasd->getpNombre_d(); echo' '.$vistasd->getsNombre_d(); echo' '. $vistasd->getpApellido_d(); echo' '.$vistasd->getsApellido_d() ?></td>
		</tr>
		<?php }?>
		<?php foreach ($listavistasp as $vistasp)  {?>
		<tr>
			<td><?php echo $vistasp->getpNombre_U(); echo' '.$vistasp->getsNombre_U() ?></td>
			<td><?php echo $vistasp->getpApellido_U(); echo' '.$vistasp->getsApellido_U() ?> </td>	
		</tr>
		<?php }?>
		<?php foreach ($listavistaca as $vistaca)  {?>
		<tr>
			<td><?php echo $vistaca->getNombreTipoCita() ?></td>
			<td><?php echo $vistaca->getdia_hora_cita() ?></td>
		</tr>
		<?php }?>
		</tbody>
	</table>
    </div>  
</div>        
</body>
</html>