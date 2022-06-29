<?php 
  require_once '../model/modelAdmin.php';
  require_once '../conexion/conexion.php';
  $tDoc = $_POST["tipo-docume-fil"];
  $numDoc = intval($_POST["num-doc-fil"]);
  $db = database::conectar();
  $crud = new crudAdmin();
  $consulta = $crud -> searcUser($tDoc, $numDoc);

  if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case 'edit':
          echo 'alu';
          break;
        case 'drop':
          $delete = new crudAdmin;
          $delete -> eliminarUser($_GET["tipoDoc"], $_GET["docu"], intval($_GET["rol"])); 
            break;
        case 'seeMore':
          $search = new crudAdmin;
          $resultado = $search -> searcUser($_GET["tipoDoc"], $_GET["docu"]);
          break;
    }
}
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
    <link rel="stylesheet" href="../css/pSAD.css">
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
              <h1>Busquedad de: <?php echo $tDoc , '-' , $numDoc; ?></h1>
              <hr>
              <section class="con-panel-pacientes">
                <br><br>
                <table class="table-info-adm">
                <thead>
                    <tr>
                        <th style="width: 35px;">Rol</th>
                        <th style="width: 35px;">T.Doc</th>
                        <th style="width: 20px;">N. Doc</th>
                        <th style="width: 120px;">Nombres</th>
                        <th style="width: 120px;">Apellidos</th>
                        <th style="width: 80px;">Correo</th>
                        <th style="width: 80px;">Telefono</th>
                        <th style="width: 100px;">Acciones</th>
                      </tr>
                </thead>
                <tbody>
                  <?php  
                    while ($r = $consulta ->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      $rol = $r['desc_rol'];
                      $tDoc = $r['usuario_tdoc'];
                      $userId = $r['usuario_id'];
                      $name = $r['Nombres'];
                      $lastName = $r['Apellidos'];
                      $email = $r['correoElectronico_U'];
                      $telefono = $r['telefono_U'];

                      echo "<td> $rol </td>";
                      echo "<td> $tDoc </td>";
                      echo "<td> $userId </td>";
                      echo "<td> $name </td>";
                      echo "<td> $lastName </td>";
                      echo "<td> $email </td>";
                      echo "<td> $telefono </td>";
                      ?>
                      <td class="actions"><a href="#" class="ac"><i class="fi-sr-pencil"></i></a>
                      <a href="" class="ac"><i class="fi-sr-eye"></i></a>
                      <a href="?action=drop&tipoDoc=<?php echo $tDoc;?>&docu=<?php echo $userId;?>&rol=<?php echo $rol;?>"onclick="return confirm('¿Esta seguro de eliminar a este usuario?')" class="ac"><i class="fi-sr-trash"></i></a>
                      </tr>
                      <?php	
                    }
                  ?>
                    <!-- <tr>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td><a href="#"><i class="fi-sr-pencil"></i></a></td>
                        <td><a href="#"><i class="fi-sr-trash"></i></a></td>
                    </tr> -->
                    
                </tbody>
              </table>
              </section>
          </section>
        </article>
      </div>
    </main>
  </body>
</html>