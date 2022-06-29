<?php
require_once ('../conexion/conexion.php');
class gesUser
{
        private $pdo;
        public function __construct(){
            try{
                $this -> pdo = database::conectar();
            }catch(Exception $ex){
                die($e -> getMessage());
            }
        }
        public function insertTableTypeRol($tdUserN,$docUserN,$rol){
            $sql = "INSERT INTO arca.usuario_has_roles (arca.usuario_has_roles.usuario_tdoc, arca.usuario_has_roles.usuario_id, arca.usuario_has_roles.usuario_rol, arca.usuario_has_roles.estado_rol) VALUES ('$tdUserN','$docUserN','$rol',1)";
            $this -> pdo -> query($sql);
        }

        #insert user
        public function insertTableRol($tdUserN,$docUserN, $rol){
            if($rol === 2){
                $sql = "INSERT INTO arca.secretaria( arca.secretaria.fk_pk_usuario_TipoDocumento, arca.secretaria.fk_pk_usuario_Documento_U) VALUES ('$tdUserN','$docUserN')";
                $this -> pdo -> query($sql);
        
            }elseif($rol === 3){
                $sql= "INSERT INTO arca.doctor( arca.doctor.fk_pk_usuario_TipoDocumento, arca.doctor.fk_pk_usuario_Documento_U) VALUES ('$tdUserN','$docUserN')";
                $this -> pdo -> query($sql);
        
            }elseif($rol === 4){
                $sql = "INSERT INTO arca.paciente( arca.usuario.fk_pk_usuario_TipoDocumento, arca.usuario.fk_pk_usuario_Documento_U) VALUES ('$tdUserN',$docUserN)";
                $this -> pdo -> query($sql);
        
            }elseif($rol === 1){
                $sql = "INSERT INTO arca.administrador( arca.administrador.fk_pk_usuario_TipoDocumento, arca.administrador.fk_pk_usuario_Documento_U) VALUES ('$tdUserN', '$docUserN')";
                $this -> pdo -> query($sql);
            }
        }



        #Delete user
        public function deleteTableTypeRol($tdUserN,$docUserN,$rol){
            $sql = "DELETE FROM arca.usuario_has_roles WHERE arca.usuario_has_roles.usuario_tdoc = '$tdUserN' and arca.usuario_has_roles.usuario_id = $docUserN and arca.usuario_has_roles.usuario_rol = $rol";
            $this -> pdo -> query($sql);
        }

        public function deleteTableRol($tdUserN,$docUserN,$rol){
            if($rol === 2){
                $sql = "DELETE FROM arca.secretaria WHERE arca.secretaria.fk_pk_usuario_TipoDocumento = '$tdUserN' and arca.secretaria.fk_pk_usuario_Documento_U = $docUserN";
                $this -> pdo -> query($sql);
        
            }elseif($rol === 3){
                $sql= "DELETE FROM arca.doctor WHERE arca.doctor.fk_pk_usuario_TipoDocumento = '$tdUserN' and arca.doctor.fk_pk_usuario_Documento_U = $docUserN";
                $this -> pdo -> query($sql);
        
            }elseif($rol === 4){
                $sql = "DELETE FROM arca.paciente WHERE arca.paciente.fk_pk_usuario_TipoDocumento = '$tdUserN' and arca.paciente.fk_pk_usuario_Documento_U = $docUserN";
                $this -> pdo -> query($sql);
        
            }elseif($rol === 1){
                $sql = "DELETE FROM arca.administrador WHERE arca.administrador.fk_pk_usuario_TipoDocumento = '$tdUserN' and arca.administrador.fk_pk_usuario_Documento_U = $docUserN";
                $this -> pdo -> query($sql);
            }
        }
}
?>
