    <?php

    class Login
    {
        public function Login_user($tdd, $doc, $clave)
        {
            session_start();

            require_once '../conexion/conexion.php';

            $db = database::conectar();

            $cont=0;

            $sql2= "SELECT * FROM usuario WHERE fk_pk_tipo_documentoU='$tdd' AND documento_U='$doc' AND claveU='$clave'";
            $result2 = $db->query($sql2);

            while ($row2=$result2->fetch(PDO::FETCH_ASSOC))
            {
                $tdoc=stripslashes($row2["fk_pk_tipo_documentoU"]);
                $ndoc=stripslashes($row2["documento_U"]);
                $clavee=stripslashes($row2["claveU"]);

            $cont=$cont+1;
            }
            if ($cont==0)
            {
                print "<script>alert(\"Usuario y/o password incorrecta\");window.location='../view/iniciosesion.html';</script>";
            }
            if($cont!=0)
            {
                $_SESSION ['fk_pk_tipo_documentoU']=$tdoc;
                $_SESSION ['documento_U']=$ndoc;

                $sql="SELECT usuario_rol FROM usuario_has_roles WHERE usuario_tdoc='$tdoc' AND usuario_id='$ndoc'";
                $result1= $db->query($sql);

                while ($row1=$result1->fetch(PDO::FETCH_ASSOC))
                {
                    $role=stripslashes($row1["usuario_rol"]);
                }
                if (@$role === null)
                {
                    print "<script>alert(\"El usuario no tiene asignado rol\");window.location='../view/iniciosesion.html';</script>";
                }
                if (@$role === '1')
                {
                    $_SESSION['active']=1;
                    header ('Location: ../panelAdmin.html');
                }
                if (@$role === '2')
                {
                    $_SESSION['active']=1;
                    header ('Location: ../view/panelSecretary.html');
                }
                if (@$role === '3')
                {
                    $_SESSION['active']=1;
                    header ('Location: ../view/index_doc.html');
                }
                elseif (@$role === "4")
                {
                    $_SESSION['active']=1;
                    header ('Location: ../view/panelPaciente.html');
                }
            }

        }
    }
    $Nuevo=new Login();
    $Nuevo->Login_user($_POST["fk_pk_tipo_documentoU"], $_POST["documento_U"], $_POST["claveU"]);
?>
</body>
</html>