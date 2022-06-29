<?php
require "../../arca/model/nUser.php";
$db = database::conectar();
class crudPqrsf
{
        private $pdo;
        public function __construct(){
            try{
                $this -> pdo = database::conectar();
            }catch(Exception $ex){
                die($ex -> getMessage());
            }
        }
        
        public function mostrarPqrsf(){
            $db = database::conectar();
            $sql = "SELECT arca.usuario.fk_pk_tipo_documentoU, arca.usuario.documento_U, CONCAT(arca.usuario.pNombre_U, ' ', arca.usuario.sNombre_U) as Nombres, CONCAT(arca.usuario.pApellido_U, ' ', arca.usuario.sApellido_U) as Apellidos, arca.usuario.correoElectronico_U, arca.pqrsf.NumeroRadicacion, arca.tipopqrsf.TipoPQRSF, arca.pqrsf.FechaPQRSF, arca.pqrsf.MotivoPQRSF, arca.pqrsf.EstadoPQRSF 
            FROM arca.pqrsf 
            join arca.usuario on arca.pqrsf.fk_usuario_Documento_U = arca.usuario.documento_U 
            join arca.tipopqrsf on arca.tipopqrsf.idTipoPQRSF = arca.pqrsf.fk_pk_idTipoPQRSF";
            $query = $db -> query($sql);
            return $query;
        }
    }
print_r($_POST);
?>