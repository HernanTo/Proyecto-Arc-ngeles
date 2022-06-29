<?php
require_once "../arca/model/modelCitas.php";
$crud = new crudCitas();
$query = $crud -> mostarCitas();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel</title>
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/panel.css" />
    <link rel="stylesheet" href="./assets/icons/css/uicons-solid-rounded.css">
    <link rel="shortcut icon" href="./assets/img/Logos/Logo TEXT.svg">
    <link rel="stylesheet" href="./css/guA.css">
    <link rel="stylesheet" href="./css/infoCitas.css">
  </head>
  <body>
    <main>  
      <div class="contenedor">
      <header>
          <section class="item-logo">
              <figure><img src="./assets/img/Logos/Logo TEXT.svg" alt=""></figure>
          </section>
          <a href="./secretary.php" class="item-panel item-panel-1">
              <i class="fi-sr-head-side-thinking icon-panel"></i>
              <p href="">Gestion de Pacientes</p>
          </a>
          <a href="./" class="item-panel item-panel-2">
              <i class="fi-sr-user-add icon-panel"></i>
              <p href="">Citas Medicas </p>
          </a>
          <a href="./view/pqrsf.php" class="item-panel item-panel-3">
              <i class="fi-sr-comment-alt icon-panel"></i>
              <p href="">PQRSF</p>
          </a>
          <a href="" class="item-panel item-panel-4">
              <i class="fi-sr-interrogation icon-panel"></i>
              <p href="">Ayuda</p>
          </a>
      </header>
        <article class="con-head">
          <section class="con-name-pag"><h2>Gestion de Pacientes</h2></section>
          <section class="con-user-info">
            <h3>Nombre User</h3>
            <a href="">CERRAR SESIÓN</a>
          </section>
          <section class="con-photo-p">
            <figure><img src="g" alt="" /></figure>
          </section>
        </article>

        <!-- Contendor -->
       <article class="con-panel">
          <section class="con-info-usu">
              <h1>Datos de la cita</h1>
              <hr>
              <section class="con-panel-pacientes">
                <br><br>
	              <table class="table-info-adm">
                <thead>
                <tr>
                <th style="width: 35px;">Tipo de cita</th>
                <th style="width: 35px;">Fecha y hora</th>
                <th style="width: 200px;">Nombres</th>
                <th style="width: 200px;">Apellidos</th>
                <th style="width: 150px;">Especialista</th>
                <th style="width: 80px;">Reprogramar</th>
                <th style="width: 150px;">Cancelar</th>
              </tr>
              </thead>
              <tbody>
              <?php

              while($r = $query -> fetch(PDO::FETCH_ASSOC)){
                  echo "<tr>";
                  $idCita = intval($r['idCitas']);
                  $tipoCita = $r['NombreTipoCita'];
                  $fechaCita = $r['dia_hora_cita'];
                  $docDoctor = $r['fk_doctor_Documento_U'];
                  $tdocDoctor = $r['fk_doctor_TipoDocumento'];
                  $nombrePaciente = $r['NombresP'];
                  $apellidoPaciente = $r['ApellidosP']; 
              
                  echo "<td> $tipoCita </td>";
                  echo "<td> $fechaCita </td>";
                  echo "<td> $nombrePaciente </td>";
                  echo "<td> $apellidoPaciente </td>";

                  $datosDoctor = $crud -> trearDatosDoctor($idCita, $tdocDoctor, $docDoctor); 
               
                  
                  while($i = $datosDoctor -> fetch(PDO::FETCH_ASSOC)){
                      $nombreDoctor = $i['Especialista']; 
                      echo "<td> $nombreDoctor </td>";
                      echo "<td><a href='../arca/editCita.html'><i class='fi-sr-pencil'></i></a></td>";
                      echo "<td><a href='#'><i class='fi-sr-cross-circle'></i></a></td>";
                  }
                  echo "</tr>";
              }
              ?>

              </tbody>
            </table>
      </div>
    </main>
  </body>
</html>