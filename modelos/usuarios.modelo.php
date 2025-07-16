<?php


class ModeloRegistro {
    /**
     * Obtener un usuario por nombre o correo electrónico
     * Para validación de login
     */
    public static function mdlObtenerUsuario($tabla, $usuario) {
        $sql = "SELECT * FROM {$tabla} 
                WHERE usuario = :usuario OR correo_usuario = :usuario 
                LIMIT 1";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $resultado;
    }
}



    /*=============================================
    Registrar usuario
    =============================================*/
  //  static public function mdlRegistro($tabla, $datos){
        //$sql = "INSERT INTO {$tabla} 
          //          (pers_nombre, pers_correo, pers_contrasena) 
            //    VALUES 
              //      (:nombre, :correo, :clave)";

        //$stmt = Conexion::conectar()->prepare($sql);

        //$stmt->bindParam(":nombre",   $datos["pers_nombre"],   PDO::PARAM_STR);
        //$stmt->bindParam(":correo",   $datos["pers_correo"],   PDO::PARAM_STR);
        //$stmt->bindParam(":clave",    $datos["pers_contrasena"],    PDO::PARAM_STR);

//        $ok = $stmt->execute();
  //      $stmt->closeCursor();
    //    return $ok ? "ok" : "error";
    //}
