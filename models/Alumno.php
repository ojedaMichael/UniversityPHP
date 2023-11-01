<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php" );

class Alumno{

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

     public static function Inscribir($data) {
          $id = $data["id"];
          $clase = $data["clase"];

          $res = DB::query("insert into inscripciones(ID_Alumno, ID_Clase) values($id, $clase)");

          if ($res) {
               return true;
          }

     }

     public static function Borrar($data) {
          $id = $data["inscripcion"];
          

          $res = DB::query("delete from inscripciones where ID_Inscripcion = '$id'");

          if ($res) {
               return true;
          }

     }

     public static function AlumnoClases() {

          session_start();
          $dataPersonales = $_SESSION["user"];
          extract($dataPersonales[0]);

          $res = DB::query("select a.ID_Alumno, c.ID_Clase, c.NombreClase, i.ID_Inscripcion, i.Calificacion from inscripciones i inner join clases c on i.ID_Clase = c.ID_Clase inner join alumnos a on i.ID_Alumno = a.ID_Alumno inner join usuarios u on a.ID_Usuario = u.ID_Usuario where u.ID_Usuario = '$ID_Usuario';");
          $res2 = DB::query("select * from clases ;");
          $dataClases = $res->fetchAll(PDO::FETCH_ASSOC);
          $dataClases2 = $res2->fetchAll(PDO::FETCH_ASSOC);

          session_start();
          $_SESSION["clasesDisponibles"] = $dataClases2;


          return $dataClases;
     }
}