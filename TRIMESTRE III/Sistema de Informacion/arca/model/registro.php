<?php
class register 
{
    private $pdo;
    public function __CONSTRUCT()
    {
        try{
            $this->pdo = database::conectar();
        }

        catch(Exception $ex){
            die($e->getMessage());
        }
    }

    public function Insert_register($tdoc, $doc, $nombreu, $nombres, $apellidou, $apellidos, $fnac, $direccion, $correo, $tel, $clave, $preg, $respt) 
    {
        $sql = "INSERT INTO usuario (fk_pk_tipo_documentoU, documento_U, pNombre_U, sNombre_U, pApellido_U, sApellido_U, fechaNacimiento_U, direccion_U, correoElectronico_U, telefono_U, claveU, fk_pregunta_seg, resp_preg) VALUES ('$tdoc','$doc', '$nombreu', '$nombres', '$apellidou', '$apellidos', '$fnac', '$direccion', '$correo', '$tel', '$clave', '$preg', '$respt')";

        $this->pdo->query($sql);

        $sql1 = "INSERT INTO usuario_has_roles (usuario_tdoc, usuario_id, usuario_rol, estado_rol) VALUES ('$tdoc', '$doc', 4, 1)";

        $this->pdo->query($sql1);

        $sql2 = "INSERT INTO paciente (fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) VALUES ('$tdoc', '$doc')";

        $this->pdo->query($sql2);

        print "<script>alert(\"Registro agregado exitosamente. \");window.location='viewregister.php';</script>";

    }
}
?>