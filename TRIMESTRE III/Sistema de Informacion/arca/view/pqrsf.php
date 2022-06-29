<?php
    require_once '../model/modelPqrsf.php';
    require_once '../conexion/conexion.php';
    $db = database::conectar();
    $crud = new crudPqrsf();
    $consulta = $crud -> mostrarPqrsf();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/panel.css" />
    <link rel="stylesheet" href="../assets/icons/css/uicons-solid-rounded.css">
    <link rel="shortcut icon" href="../assets/img/Logos/Logo TEXT.svg">
    <link rel="stylesheet" href="../css/pqrsf.css">
  </head>
  <body>
    <main>
      <div class="contenedor">
        <header>
            <section class="item-logo">
                <figure><img src="../assets/img/Logos/Logo TEXT.svg" alt=""></figure>
            </section>
            <a href="../guA.html" class="item-panel item-panel-1">
                <i class="fi-sr-head-side-thinking icon-panel"></i>
                <p href="">Gestion de Usuarios</p>
            </a>
            <a href="./" class="item-panel item-panel-2">
                <i class="fi-sr-user-add icon-panel"></i>
                <p href="">S. Pacientes Nuevos</p>
            </a>
            <a href="./pqrsf.php" class="item-panel item-panel-3">
                <i class="fi-sr-comment-alt icon-panel"></i>
                <p href="">PQRSF</p>
            </a>
            <a href="" class="item-panel item-panel-4">
                <i class="fi-sr-interrogation icon-panel"></i>
                <p href="">Ayuda</p>
            </a>
        </header>
        <article class="con-head">
          <section class="con-name-pag"><h2>Panel</h2></section>
          <section class="con-user-info">
            <h3>Nombre User</h3>
            <a href="">CERRAR SESIÓN</a>
          </section>
          <section class="con-photo-p">
            <figure><img src="../assets/img/userPhotos/DC.png" alt="" /></figure>
          </section>
        </article>

        <!-- Contendor -->
        <article class="con-panel">
          <section class="con-info-usu">
              <h1>PQRSF</h1>
              <hr>
              <section class="con-panel-pacientes">
                <br><br>
                <table class="table-info-adm">
                <thead>
                    <tr>
                        <th style="width: 35px;">T.Doc</th>
                        <th style="width: 35px;">Documento</th>
                        <th style="width: 200px;">Nombres</th>
                        <th style="width: 200px;">Apellidos</th>
                        <th style="width: 150px;">Correo</th>
                        <th style="width: 20px;">ID</th>
                        <th style="width: 70px;">Tipo</th>
                        <th style="width: 10px;">Fecha</th>
                        <th style="width: 200px;">Razones</th>
                        <th style="width: 20px;">Estado</th>
                        <th style="width: 20px;">Editar</th>
                      </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php  
                    while ($r = $consulta ->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      $tDoc = $r['fk_pk_tipo_documentoU'];
                      $doc = $r['documento_U'];
                      $nombre = $r['Nombres'];
                      $apellidos = $r['Apellidos'];
                      $email = $r['correoElectronico_U'];
                      $nRadicacion = $r['NumeroRadicacion'];
                      $typePqrsf = $r['TipoPQRSF'];
                      $fechaPqrsf = $r['FechaPQRSF'];
                      $motivo = $r['MotivoPQRSF'];
                      $estado = $r['EstadoPQRSF'];
                      echo "<td> $tDoc </td>";
                      echo "<td> $doc </td>";
                      echo "<td> $nombre </td>";
                      echo "<td> $apellidos </td>";
                      echo "<td> $email </td>";
                      echo "<td> $nRadicacion </td>";
                      echo "<td> $typePqrsf </td>";
                      echo "<td> $fechaPqrsf </td>";
                      echo "<td> $motivo </td>";
                      echo "<td> $estado </td>";
                      echo '<td><a href="#"><i class="fi-sr-pencil"></i></a></td>';
                      echo "</tr>";
                    }
                  ?>
                        <!-- <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td><a href="#"><i class="fi-sr-pencil"></i></a></td> -->
                      </tr>
                </tbody>
              </table>
              </section>
          </section>
        </article>
      </div>
    </main>
  </body>
</html>