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
    <link rel="stylesheet" href="./css/editProfile.css">
    <link rel="shortcut icon" href="./assets/img/Logos/Logo TEXT.svg">
    <link href="" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="contenedor">
        <header>
            <section class="item-logo">
                <figure><img src="./assets/img/Logos/Logo TEXT.svg" alt=""></figure>
            </section>
            <a href="" class="item-panel item-panel-1">
                <i class="fi-sr-calendar icon-panel"></i>
                <p href="">Calendario</p>
            </a>
            <a href="" class="item-panel item-panel-2">
                <i class="fi-sr-stethoscope icon-panel"></i>
                <p href="">Diagnóstico</p>
            </a>
            <a href="" class="item-panel item-panel-3">
                <i class="fi-sr-user icon-panel"></i>
                <p href="">Perfil</p>
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
            <a href="./index.html">CERRAR SESIÓN</a>
          </section>
          <section class="con-photo-p">
            <figure><img src="./assets/img/userPhotos/DC.png" alt="" /></figure>
          </section>
        </article>

        <!-- Contendor -->
        <article class="con-panel">
        <section class="contenedor_perfil-usuario__Editar">
                <figure>
                    <img src="./assets/img/userPhotos/DC.png" alt="Foto de Perfil del Usuario">
                </figure>
                <div><i class="fi fi-sr-camera"></i></div>
            </section>
            <section class="contenedor_perfil-usuario__Formulario">
                <form>
                    <span><h3>MARIA ROMERO</h3></span>
                    <span>CC - 10227630933</span><br><br>
                    <input type="text" placeholder="Fecha Nacimiento" required><br>
                    <input type="text" placeholder="Dirección" required><br>
                    <input type="number" placeholder="Teléfono" required><br>
                    <input type="text" placeholder="Correo Electrónico" required><br>
                    <input type="text" placeholder="EPS" required><br>
                    <input type="submit" value="Editar" class="btn-edit-profile">
                </form>
            </section>   
        </article>
      </div>
    </main>
  </body>
</html>