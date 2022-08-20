<?php
class usuario{
    public function inhabilitarUser($tdd, $documento, $db){
        $sql = "SELECT estado_U FROM usuario WHERE fk_pk_tipo_documentoU = '$tdd' AND documento_U = '$documento'";
        $resultado = $db -> query($sql);
        while($row = $resultado -> fetch_assoc()){
            $estado = $row['estado_U'];
            if(intval($estado) != 1){
                $sql = "UPDATE usuario set estado_U = 1 WHERE fk_pk_tipo_documentoU = '$tdd' AND documento_U = '$documento'";
                mysqli_query($db, $sql);
                
            }else{
                $sql = "UPDATE usuario set estado_U = 0 WHERE fk_pk_tipo_documentoU = '$tdd' AND documento_U = '$documento'";
                mysqli_query($db, $sql);
                
            }
        }
    }
}
?>