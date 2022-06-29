<?php
require 'conexion.php';
$db = database::conectar();
class crudCitas
{
        private $pdo;
        public function __construct(){
            try{
                $this -> pdo = database::conectar();
            }catch(Exception $ex){
                die($e -> getMessage());
            }
        }
        
        public function mostarCitas(){
            $db = database::conectar();
            $sql = "SELECT arca.citasagendadas.idCitas, arca.tiposdecita.NombreTipoCita, arca.citasagendadas.dia_hora_cita, arca.citasagendadas.estadoCita, arca.citasagendadas.Observaciones, CONCAT(arca.usuario.pNombre_U, ' ', arca.usuario.sNombre_U) as NombresP, CONCAT(arca.usuario.pApellido_U, ' ', arca.usuario.sApellido_U) as ApellidosP, arca.citasagendadas.fk_doctor_TipoDocumento, arca.citasagendadas.fk_doctor_Documento_U
            from arca.citasagendadas 
            join arca.tiposdecita on arca.tiposdecita.idTiposCita = arca.citasagendadas.fk_pk_idTipocita 
            join arca.usuario on arca.citasagendadas.fk_paciente_Documento_U = arca.usuario.documento_U";

            $query = $db -> query($sql);

            return $query;
        }

        public function trearDatosDoctor($idCita, $tdocDoctor, $docDoctor){
            $db = database::conectar();
            $sql = "SELECT arca.citasagendadas.idCitas, CONCAT(arca.usuario.pNombre_U, ' ', arca.usuario.sNombre_U, ' ', arca.usuario.pApellido_U, ' ', arca.usuario.sApellido_U) as Especialista
            from arca.citasagendadas 
            join arca.usuario on arca.citasagendadas.fk_doctor_Documento_U = arca.usuario.documento_U
            where arca.citasagendadas.idCitas = $idCita and arca.citasagendadas.fk_doctor_Documento_U = $docDoctor and  arca.citasagendadas.fk_doctor_TipoDocumento = '$tdocDoctor'";

            $query = $db -> query($sql);

            return $query;
        }

        public function editarCita($fechaC){
            // Secretaria: editar fecha de la cita
            $sql = "UPDATE citasAgendadas set dia_hora_cita = '$fechaC' where dia_hora_cita = fk_paciente_Documento_U";
            
            $this -> pdo -> query($sql);

            print"<script>alert(\"Fecha de la cita actualizado exitosamente \");window.location='../secretary.php';</script>";

        }

    }
?>