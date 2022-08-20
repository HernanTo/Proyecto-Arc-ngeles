<?php
    class usuario{
        public function traerUsuarios($rolUser, $docUser, $db ){
            switch ($rolUser) {
                case 1:
                    $sql = "SELECT usuario_tdoc, usuario_id, usuario_rol, CONCAT(pNombre_U, ' ', sNombre_U, ' ', pApellido_U, ' ', sApellido_U) as 'Nombre'
                    from usuario_has_roles 
                    inner JOIN usuario 
                    on documento_U = usuario_id";
                    break;

                case 2:
                    $sql = "SELECT usuario_tdoc, usuario_id, usuario_rol, CONCAT(pNombre_U, ' ', sNombre_U, ' ', pApellido_U, ' ', sApellido_U) as 'Nombre' from usuario_has_roles inner JOIN usuario on documento_U = usuario_id WHERE usuario_rol = 3 or usuario_rol = 4";
                    $resultado = $db -> query($sql);
                    break;

                case 3:
                    $sql = "SELECT * FROM citasmedicas WHERE docDoctor = $docUser AND estadoCita = 1";
                    $resultado = $db -> query($sql);     
            }
            
            $resultado = $db -> query($sql);
            return $resultado;
        }
    }
?>