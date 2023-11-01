<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/Maestro.php");

class MaestroController{

    public function MaestroEditProfileView() {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/MaestroEditProfile.php");
    }

    public function MaestroEditProfile($request) {
    
        $edited = Maestro::EditProfile($request);
 
        if($edited){
         header("location: /maestroDashboard");
        }
     }

    public function MaestroDashboard() {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/MaestroDasboard.php");
    }

    public function MaestroAlumnosReadView() {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Maestro/MaestroAlumnosRead.php");
    }

    public function MaestroAlumnosRead() {

        $clase = Maestro::ReadClass();
        var_dump($clase);
        session_start();
        $_SESSION["claseRead"] = $clase;

        
        header("location: /maestroAlumnosReadView");
    
    }

    public function EditCalificacion($request) {

        $edited = Maestro::Calificacion($request);

        if ($edited) {
            header("location: /maestroAlumnosRead");
        }

    }

}