<?php
    class usuario{
        public function crearUser($tdd, $docuUser, $estado, $pNombre, $sNombre, $pApellido, $sApellido, $fechaNa, $direccion, $email, $celNum, $eps, $especialidad, $clave, $preguntaS, $resp, $photo){

            // Crear nuevo usuario

            $sql = "INSERT INTO usuario (fk_pk_tipo_documentoU, documento_U, estado_U, pNombre_U, sNombre_U, pApellido_U, sApellido_U, fechaNacimiento_U, direccion_U, correoElectronico_U, celular_U, eps_P, especialidad_U, claveU, fk_pregunta_seg, resp_preg, photo) VALUES ('$tdd', '$docuUser', '$estado', '$pNombre', '$sNombre', '$pApellido', '$sApellido', '$fechaNa', '$direccion', '$email', '$celNum', '$eps', '$especialidad', '$clave', '$preguntaS', '$resp ', '$photo')";
            
            mysqli_query($db, $sql);
        }
    }
?>