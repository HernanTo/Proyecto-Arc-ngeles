<?php
class Recu_pass
{
    public function recuperar($tdoc, $id_usu, $respuesta)
    {
        session_start();
        require_once '../conexion/conexion.php';

        $db = database::conectar();

        $cont=0;

        $sql2="SELECT * FROM usuario WHERE fk_pk_tipo_documentoU='$tdoc' AND documento_U='$id_usu' AND resp_preg='$respuesta'";
        $result2= $db->query($sql2);

        while ($row1=$result2->fetch(PDO::FETCH_ASSOC))
        {
            $tdoc=stripslashes($row1["fk_pk_tipo_documentoU"]);
            $id_usu=stripslashes($row1["documento_U"]);
            $respuesta=stripslashes($row1["resp_preg"]);
            $cont=$cont+1;
        }

        if ($cont==0)
        {
            print "<script>alert(\"Usuario no encontrado o respuesta incorrecta\");window.location='../view/vistaolvidarcont.html';</script>";
        }
        if ($cont!=0)
        {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password =  substr(str_shuffle($permitted_chars), 0, 10);

            $_SESSION ['fk_pk_tipo_documentoU']=$tdoc;
            $_SESSION ['documento_U']=$ndoc;
            $_SESSION ['resp_preg']=$respuesta;

            $sql="SELECT usuario_rol FROM usuario_has_roles WHERE usuario_tdoc='$tdoc' AND usuario_id='$ndoc'";
            $result1= $db->query($sql);

            $sql1="UPDATE usuario SET claveU = '$password' WHERE fk_pk_tipo_documentoU = '$tdoc' AND documento_U = '$id_usu'";
            $db->query($sql1);
            print "<script>alert(\"Clave temporal: temp123\");window.location='../view/vistaolvidarcont.html';</script>";
        }
    }
}

$Nuevo=new Recu_pass();
$Nuevo->recuperar($_POST["fk_pk_tipo_documentoU"], $_POST["documento_U"], $_POST["resp_preg"]);

?>