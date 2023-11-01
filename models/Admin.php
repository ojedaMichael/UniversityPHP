<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php" );

class Admin{
    
    public static function AlumnoRead(){
        $res = DB::query("select a.ID_Alumno, u.ID_Usuario, u.Nombre, u.Apellido, u.CorreoElectronico, u.Rol from alumnos a inner join usuarios u on u.ID_Usuario = a.ID_Usuario where Rol = 'alumno' ;");
        $dataAlumnos = $res->fetchAll(PDO::FETCH_ASSOC);

        return $dataAlumnos;
    } 

    public static function ClasesRead(){
        $res = DB::query("select c.ID_Clase, c.NombreClase,u.ID_Usuario, u.Nombre, u.Apellido, m.ID_Maestro, u.CorreoElectronico, mc.ID_Maestro_Clase from clases c inner join maestro_clase mc on c.ID_Clase = mc.ID_Clase inner join maestros m on m.ID_Maestro = mc.ID_Maestro inner join usuarios u on m.ID_Usuario = u.ID_Usuario where c.NombreClase <> 'inactivo' and u.Rol <> 'inactivo';");
        $dataClases = $res->fetchAll(PDO::FETCH_ASSOC);

        return $dataClases;
    }

    public static function UsuariosRead(){
        $res = DB::query("select * from usuarios;");
        $dataUsuarios = $res->fetchAll(PDO::FETCH_ASSOC);

        return $dataUsuarios;
    }

    public static function All () {
        session_start();

        $res = DB::query("select a.ID_Alumno, u.ID_Usuario, u.Nombre, u.Apellido, u.CorreoElectronico, u.Rol from alumnos a inner join usuarios u on u.ID_Usuario = a.ID_Usuario where Rol = 'alumno' ;");
        $dataAlumnos = $res->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["alumnos"] = $dataAlumnos;

        $res1 = DB::query("select c.ID_Clase, c.NombreClase,u.ID_Usuario, u.Nombre, u.Apellido, m.ID_Maestro, u.CorreoElectronico, mc.ID_Maestro_Clase from clases c inner join maestro_clase mc on c.ID_Clase = mc.ID_Clase inner join maestros m on m.ID_Maestro = mc.ID_Maestro inner join usuarios u on m.ID_Usuario = u.ID_Usuario where c.NombreClase <> 'inactivo' ;");
        $dataClases = $res->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["maestros"] = $dataClases;
        $_SESSION["clases"] = $dataClases;

        $res2 = DB::query("select * from usuarios;");
        $dataUsuarios = $res->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["usuarios"] = $dataUsuarios;

        if ($res && $res1 && $res2) {
            return true;
        }
    }
    public static function Delete($id) {
         
        $res = DB::query("UPDATE usuarios SET Rol = 'inactivo' WHERE ID_Usuario = '$id';");

        if ($res) {
            return true;
        }

    }

    public static function DeleteClase($id) {
         
        $res = DB::query("UPDATE clases SET NombreClase = 'inactivo' WHERE ID_Clase = '$id';");

        if ($res) {
            return true;
        }

    }

    public static function DeleteMaestro($id) {
         
        $res = DB::query("UPDATE usuarios SET Rol = 'inactivo' WHERE ID_Usuario = '$id';");

        if ($res) {
            return true;
        }

    }

    public static function FindUsers($id) { 

        $res = DB::query("select * from usuarios where ID_Usuario=$id");
        $dataFind = $res->fetchAll(PDO::FETCH_ASSOC);

        return $dataFind;
    }

    public static function FindMaestro($id) { 

        $res = DB::query("select u.ID_Usuario,u.Nombre,u.Apellido,u.CorreoElectronico,mc.ID_Maestro_Clase from usuarios u inner join maestros m on u.ID_Usuario = m.ID_Usuario inner join maestro_clase mc on mc.ID_Maestro = m.ID_Maestro where mc.ID_Maestro_Clase=$id");
        $dataFind = $res->fetchAll(PDO::FETCH_ASSOC);

        return $dataFind;
    }

    public static function FindClase($id) { 

        $res = DB::query("select * from clases where ID_Clase=$id");
        $dataFind = $res->fetchAll(PDO::FETCH_ASSOC);

        return $dataFind;
    }

    public static function Edit($data) {

        $id = $data["id"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];

        $res = DB::query("update usuarios set Nombre = '$nombre', Apellido = '$apellido', CorreoElectronico = '$correo' where ID_Usuario = $id ");

        if ($res) {
            return true;
        }
    }

    public static function EditTeacher($data) {

        $id = $data["id"];
        $idMaestroClase = $data["idMaestroClase"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];
        $clase = $data["clase"];

        $res1 = DB::query("update usuarios set Nombre = '$nombre', Apellido = '$apellido', CorreoElectronico = '$correo' where ID_Usuario = $id ");
        $res2 = DB::query("update maestro_clase set ID_Clase = '$clase' where ID_Maestro_Clase = '$idMaestroClase'");
        if ($res1 && $res2 ) {
            return true;
        }
    }

    public static function EditClase($data) {

        $id = $data["id"];
        $clase = $data["nombreClase"];
        $maestro = $data["maestro"];

        $res1 = DB::query("update maestro_clase set ID_Maestro = '$maestro' where ID_Clase = '$id' ");
        $res2 = DB::query("update clases set nombreClase = '$clase' where ID_clase = '$id' ");

        if ($res1 && $res2) {
            return true;
        }
    }

    public static function EditPermiso($data) {

        $id = $data["id"];
        $rol = $data["rol"];

        $res = DB::query("update usuarios set Rol = '$rol' where ID_Usuario = '$id' ");

        if ($res) {
            return true;
        }
    }

    public static function Create($data) {

        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];
        $contrasena = $data["contrasena"];
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $res = DB::query("insert into usuarios(Nombre, Apellido, Password, CorreoElectronico, Rol) values ('$nombre','$apellido', '$hash', '$correo', 'alumno');");

        if ($res) {
            $res2 = DB::query("select ID_Usuario from usuarios where CorreoElectronico = '$correo'");
            $datares2 = $res2->fetch(PDO::FETCH_ASSOC);

            if ($res2) {
                $dataID = $datares2["ID_Usuario"];

                $res3 = DB::query("insert into alumnos(ID_Usuario) values('$dataID')");

                if ($res3) {
                    return true;
                }
            }
        }
    }

    public static function CreateClass($data) {

        $nombre = $data["nombre"];
        $maestro = $data["maestro"];
        $res = DB::query("insert into clases(NombreClase) values ('$nombre');");

        if ($res) {
            $res2 = DB::query("select ID_Clase from clases where NombreClase='$nombre'");
            $dataID = $res2->fetch(PDO::FETCH_ASSOC);

            if ($res2) {
                $idclase = $dataID["ID_Clase"];

                $res3 = DB::query("insert into maestro_clase(ID_Clase, ID_Maestro) values('$idclase', '$maestro')");

                if ($res3) {
                    return true;
                }
            }
        }
    }

    public static function CreateTeacher($data) {

        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];
        $contrasena = $data["contrasena"];
        $clase = $data["clase"];
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $res = DB::query("insert into usuarios(Nombre, Apellido, CorreoElectronico, Password, Rol) values ('$nombre', '$apellido', '$correo', '$hash', 'maestro' );");

        if ($res) {
           $res2 = DB::query("select ID_Usuario from usuarios where CorreoElectronico='$correo'");
           $dataRes2 = $res2->fetch(PDO::FETCH_ASSOC);
            
           if($res2) {
           $idUsuario = $dataRes2["ID_Usuario"];

           $res3 = DB::query("insert into maestros(ID_Usuario) values('$idUsuario')");
           
            if($res3) {
            $res4 = DB::query("select ID_Maestro from maestros where ID_Usuario='$idUsuario'");
            $dataRes4 = $res4->fetch(PDO::FETCH_ASSOC);

                if($res4){
                    $idMaestro = $dataRes4["ID_Maestro"];
                    $res5 = DB::query("insert into maestro_clase(ID_Maestro, ID_Clase) values('$idMaestro', '$clase')");
                    
                    if($res5) {
                        return true;
                    }
                }
            }
           }
        }
    }
}