<?php
    class cita{
        public function agendarCita($tdd, $documento, $idCita, $db){
            $sql = "UPDATE citasmedicas SET estadoCita = 0,  docPaciente = ' ', tddPaciente = ' ' WHERE id_cita = $idCita";
            mysqli_query($db, $sql);
        }
    }
?>