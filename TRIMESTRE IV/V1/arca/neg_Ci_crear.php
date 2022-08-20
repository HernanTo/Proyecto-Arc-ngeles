<?php
    class cita{
        public function agendarCita($tdd, $documento, $idCita, $db){
            $sql = "UPDATE citasmedicas SET estadoCita = 1,  docPaciente = '$documento', tddPaciente = '$tdd' WHERE id_cita = $idCita";
            mysqli_query($db, $sql);
        }
    }
?>