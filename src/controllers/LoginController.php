<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/Login.php");

class LoginController{

    public function index() {

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php";
    }

    public function Login($request) {
       
        $data=Login::FindOne($request["correo"]);
        $passwordHashed = $data[0]['Password'];
        $passwordLogin = $request["contrasena"];
        
        if ($data === false) {
            echo "no coinciden las credenciales";
           
        } else {
            if (password_verify($passwordLogin,$passwordHashed)) {
                
                session_start();
                $_SESSION["user"] = $data;
                $_SESSION["pass"] = $passwordLogin;
                switch ($data[0]["Rol"]) {
                    case "maestro":
                        header("location: /maestroDashboard");
                        break;
                    case "admin":
                        header("location: /adminDashboard");
                        break;
                    case "alumno":
                        header("location: /alumnoDashboard");
                        break;
                    default:
                        echo "nada";
                }
            }
          
        }
    }

    public function Logout(){

        session_start();
        session_unset();
        session_destroy();
        header("Location: /index.php");
    }

}