<?php
    class cita(){
        public function asignarCita( $fecha, $hora, $consultorio, $docDoc, $db, $tddDoc){
            $sql = "INSERT INTO citasmedicas(fecha, hora, estadoCita, consultorio, docDoctor, tddDoctor) VALUES ('$fecha','$hora', 0 ,'$consultorio','$docDoc', '$tddDoc')";
            mysqli_query($db, $sql);
        }
    }
?>