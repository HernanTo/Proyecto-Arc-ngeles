<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse │ Arca </title>
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="shortcut icon" href="../assets/img/Logos/Logo TEXT.svg">
    <link rel="stylesheet" href="../css/main.css" />
</head>

<body class="grid-container">
    <aside class="image">
        <img src="../assets/img/arca register.png" class="imgwave">
    </aside>
    <div class="container, form">
        <div class="login-content">
            <form action="../model/registro.php" method="post" >
                <h2>Registrarse<span style="color: #483D8B; font-size: 50px;">.</span></h2>
                <p>¿Ya tienes cuenta? <a class="inse" href="../view/iniciosesion.html">Inicia sesión.</a> </p>
                <div class="input-div one">
                    <div class="div">
                        <select name="fk_pk_tipo_documentoU" required>
                            <option value="">Tipo de documento</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="CE">Cedula de extranjeria</option>
                        </select>
                        <input type="text" name="documento_U" id="documento_U" placeholder="Número de documento"
                            required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="div">
                        <input type="text" name="pNombre_U" id="pNombre_U" placeholder="Primer nombre" required>
                        <input type="text" name="sNombre_U" id="sNombre_U" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="div">
                        <input type="text" name="pApellido_U" id="pApellido_U" required placeholder="Primer apellido">
                        <input type="text" name="sApellido_U" id="sApellido_U" placeholder="Segundo apellido">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="div">
                        <input type="date" name="fechaNacimiento_U" id="fechaNacimiento_U" required>
                        <input type="text" name="direccion_U" id="direccion_U" placeholder="Dirección de residencia"
                            required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="div">
                        <input type="email" name="correoElectronico_U" id="correoElectronico_U"
                            placeholder="Correo electrónico" required>
                        <input type="text" name="telefono_U" id="telefono_U" placeholder="Número telefonico" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="div">
                        <input type="password" name="claveU" id="claveU" placeholder="Contraseña" required>
                        <input type="password" name="claveU" id="claveU" placeholder="Confirme su contraseña" required>
                    </div>
                </div>
                <p>Esta pregunta de seguridad sera usada en caso de olvidar la contraseña.</p>
                <div class="input-div one">
                <div class="div">
                <select name="fk_pregunta_seg" required>
                            <option value="">Pregunta de seguridad</option>
                            <option value="1">¿Cuál era el nombre de su primera mascota?</option>
                            <option value="2">¿Cual es el nombre de la ciudad en la que naciste?</option>
                        </select>
                        <input type="text" name="resp_preg" id="resp_preg" placeholder="Respuesta a pregunta" required>
                    </div>
                    </div>
                <p>
                    <input type="submit" class="btn2" value="Volver" onClick="history.go(-1);">
                    <input type="submit" class="btn" value="Guardar" onClick="this.form.action = '?action=registrar';">
                </p>
            </form>
        </div>
    </div>

<?php

require_once '../model/registro.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{
    switch ($_REQUEST['action'])
    {
        case 'registrar':

        $insert=new register();
        $insert->Insert_register($_POST["fk_pk_tipo_documentoU"], $_POST["documento_U"], $_POST["pNombre_U"], $_POST["sNombre_U"], $_POST[ "pApellido_U"], $_POST["sApellido_U"], $_POST["fechaNacimiento_U"], $_POST["direccion_U"], $_POST["correoElectronico_U"], $_POST["telefono_U"], $_POST["claveU"], $_POST["fk_pregunta_seg"], $_POST["resp_preg"]); 
        break;
    }
}
?>
</body>

</html>