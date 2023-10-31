<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php" );

class Maestro{

    public static function EditProfile($data) {

        $id = $data["id"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];
        $contrasena = $data["contrasena"];
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $res = DB::query("update usuarios set Nombre='$nombre', Apellido='$apellido', CorreoElectronico='$correo', Password='$hash' where ID_Usuario='$id' ");

        if($res) {
             return true;
        }
   }

    public static function ReadClass() {
        
        session_start();
        $dataPersonales = $_SESSION["user"];
        extract($dataPersonales[0]);

        $res = DB::query("select a.ID_Alumno, u2.Nombre, u2.Apellido, u2.CorreoElectronico, c.NombreClase from inscripciones i inner join maestro_clase mc on i.ID_Clase = mc.ID_Clase inner join maestros m on m.ID_Maestro = mc.ID_Maestro inner join usuarios u on m.ID_Usuario = u.ID_Usuario inner join alumnos a on a.ID_Alumno = i.ID_Alumno inner join usuarios u2 on u2.ID_Usuario = a.ID_Usuario inner join clases c on i.ID_Clase = c.ID_Clase where u.ID_Usuario = '$ID_Usuario';");
        $dataClass = $res->fetchAll(PDO::FETCH_ASSOC);


        return $dataClass;
    }
}