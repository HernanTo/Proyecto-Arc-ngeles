<?php
    class usuario{
        public function editarDatos($tdd, $docUser, $primerNombre, $fechaNaci,$segundoNombre, $primerApellido, $segundoApellido, $estado, $especialidad, $rol, $db){
            
            // Actualizar datos != editar datos, en editar se puede cambiar los datos más sencibles y solo lo pueden hacer los administradores
            // Agregar datos x

            $sql = "UPDATE usuario SET fk_pk_tipo_documentoU = '$tdd', documento_U = '$docUser', estado_U = '$estado', pNombre_U = '$primerNombre', sNombre_U = '$segundoNombre', pApellido_U = '$primerApellido', sApellido_U = '$segundoApellido', fechaNacimiento_U = '$fechaNaci', especialidad_U = '$especialidad' WHERE fk_pk_tipo_documentoU = '$tdd' AND documento_U = '$docUser'";
            
            mysqli_query($db, $sql);
        }
    }
?>