<?php
require "../../arca/model/nUser.php";
$db = database::conectar();
class crudAdmin
{
        private $pdo;
        public function __construct(){
            try{
                $this -> pdo = database::conectar();
            }catch(Exception $ex){
                die($e -> getMessage());
            }
        }
        
        public function newUser($tdUserN, $docUserN, $pNameUserN, $sNameUserN, $pLastNaUserN, $sLastNaUserN, $emailUserN, $celUserN, $rol){
            // Admin: Crear nuevo usuario
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password =  substr(str_shuffle($permitted_chars), 0, 10);

            $sql = "INSERT INTO arca.usuario (arca.usuario.fk_pk_tipo_documentoU, arca.usuario.documento_U, arca.usuario.pNombre_U, arca.usuario.sNombre_U, arca.usuario.pApellido_U, arca.usuario.sApellido_U, arca.usuario.correoElectronico_U, arca.usuario.telefono_U, arca.usuario.claveU) VALUES ('$tdUserN','$docUserN','$pNameUserN','$sNameUserN','$pLastNaUserN','$sLastNaUserN','$emailUserN','$celUserN', '$password')";

            $this -> pdo -> query($sql);
            
            $newUser = new gesUser();
            $newUser -> insertTableTypeRol($tdUserN,$docUserN,$rol);
            $newUser -> insertTableRol($tdUserN,$docUserN, $rol);
            print"<script>alert(\"Usuario agregado exitosamente \");window.location='../guA.html';</script>";
        }

        public function editUser($tdUser, $docUser, $pNameUser, $sNameUser, $pLastNaUser, $sLastNaUser, $emailUser, $celUser, $addressUser){
            // Admin: Editar datos usuario
            $sql = "UPDATE usuario set pNombre_U = '$pNameUser',
                sNombre_U = '$sNameUser',
                pApellido_U = '$pLastNaUser',
                sApellido_U = '$sLastNaUser',
                correoElectronico_U = '$emailUser',
                direccion_U = '$addressUser',
                telefono_U = '$celUser'
                WHERE fk_pk_tipo_documentoU = '$tdUser' and documento_U = '$docUser';
                ";

            $this -> pdo -> query($sql);

            print"<script>alert(\"Usuario actualizado exitosamente \");window.location='../guA.html';</script>";

        }

        public function eliminarUser($tdUser, $docUser, $rol){
            $dropUser = new gesUser();
            $dropUser -> deleteTableTypeRol($tdUser,$docUser,$rol);
            $dropUser -> deleteTableRol($tdUser,$docUser, $rol);

            $sql = "DELETE FROM arca.usuario WHERE arca.usuario.fk_pk_tipo_documentoU = '$tdUser' AND arca.usuario.documento_U = '$docUser'";

            $this -> pdo -> query($sql);

            print"<script>alert(\"Usuario borrado exitosamente \");window.location='../guA.html';</script>";
        }

        public function searchRolUser($rol){
            $db = database::conectar();
            $sql = "SELECT arca.roles.desc_rol, arca.usuario_has_roles.usuario_tdoc, arca.usuario_has_roles.usuario_id,  CONCAT(arca.usuario.pNombre_U, ' ', arca.usuario.sNombre_U) as Nombres, CONCAT(arca.usuario.pApellido_U, ' ', arca.usuario.sApellido_U) as Apellidos, arca.usuario.correoElectronico_U, arca.usuario.direccion_U, arca.usuario.fechaNacimiento_U, arca.usuario.telefono_U
            from arca.usuario
            join arca.usuario_has_roles on arca.usuario_has_roles.usuario_id = arca.usuario.documento_U
            join arca.roles on arca.roles.cod_rol = arca.usuario_has_roles.usuario_rol
            WHERE arca.roles.cod_rol = '$rol'";
            $query = $db -> query($sql);
            return $query;
        }

        public function searcUser($tDoc, $numDoc){
            $db = database::conectar();
            $sql = "SELECT arca.roles.desc_rol, arca.usuario_has_roles.usuario_tdoc, arca.usuario_has_roles.usuario_id,  CONCAT(arca.usuario.pNombre_U, ' ', arca.usuario.sNombre_U) as Nombres, CONCAT(arca.usuario.pApellido_U, ' ', arca.usuario.sApellido_U) as Apellidos, arca.usuario.correoElectronico_U, arca.usuario.direccion_U, arca.usuario.fechaNacimiento_U
            from arca.usuario
            join arca.usuario_has_roles on arca.usuario_has_roles.usuario_id = arca.usuario.documento_U
            join arca.roles on arca.roles.cod_rol = arca.usuario_has_roles.usuario_rol
            WHERE arca.usuario.documento_U = '$numDoc' and arca.usuario.fk_pk_tipo_documentoU = '$tDoc'";
            $query = $db -> query($sql);
            return $query;
        }
    }
?>