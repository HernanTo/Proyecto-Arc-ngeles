<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/secretary.css" />
    <link rel="stylesheet" href="assets/icons/css/uicons-solid-rounded.css">
    <link rel="shortcut icon" href="assets/img/Logos/Logo TEXT.svg">
  </head>
  <body>
    <main>
      <div class="contenedor">
        <header>
            <section class="item-logo">
                <figure><img src="assets/img/Logos/Logo TEXT.svg" alt=""></figure>
            </section>
            <a href="" class="item-panel item-panel-1">
                <i class="fi-sr-search-alt icon-panel"></i>
                <p href="">Pacientes</p>
            </a>
            <a href="" class="item-panel item-panel-2">
              <i class="fi-sr-calendar icon-panel"></i>
                <p href="">Citas Médicas</p>
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
          <section class="con-name-pag"><h2>Pacientes</h2></section>
          <section class="con-user-info">
            <h3>Nombre User</h3>
            <a href="">CERRAR SESIÓN</a>
          </section>
          <section class="con-photo-p">
            <figure><img src="assets/img/userPhotos/DC.png" alt="" /></figure>
          </section>
        </article>

        <!-- Contendor -->
        <article class="con-panel">
          <section class="con-panel-buscador">
            <p>Buscar paciente</p>
            <form>
              <select name="Tipodocumento" required>
                <option value="">Tipo de documento</option>
                <option value="CC">Cédula de ciudadanía</option>
                <option value="TI">Tarjeta de identidad</option>
                <option value="CE">Cédula de extranjería</option>
            </select>
            <input type="int" name="numerodocumento" id="numerodocumento" placeholder="Número de documento" required>
            <button type="submit" title="Buscar"><i class="fi-sr-search"></i></button>
            </form>
          </section>
          <section class="con-panel-pacientes">
      
        
            <?php
            include ('../Página WEB/layout/Arca crud citas_paciente/mostrar_sp.php')
            ?>
            
          </section>
        </article>
      </div>
    </main>
  </body>
</html>