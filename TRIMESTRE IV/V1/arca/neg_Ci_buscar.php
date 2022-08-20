<?php
    // class cita{
        // public function buscarCitasD($tipoCita){
            date_default_timezone_set("America/Bogota");
            $DateAndTime = strval(date('m-d-Y h:i:s a', time()));
            $ObjectName = new DateTime();
            $dia = intval($ObjectName->format("d"));
            $mes = intval($ObjectName->format("m"));
            $hora = intval($ObjectName->format("H"));

            echo $dia , $mes , $hora;
            $sql = "SELECT * FROM citasmedicas WHERE estadoCita = 1";
            
        // }
    // }
?>