<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/Alumno.php");

class AlumnoController{

    public function AlumnoCalificaciones() {
        
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Alumno/AlumnoCalificaciones.php");
        
    }

    public function AlumnoDashboard() {
        
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Alumno/AlumnoDasboard.php");
        
    }

    public function AlumnoClases() {

        $data = Alumno::AlumnoClases();

        session_start();
        $_SESSION["alumnoClases"] = $data;
    
        header("location: /alumnoClasesView");
        

    }

    public function AlumnoClasesView() {

       require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Alumno/AlumnoClases/AlunmoClasesRead.php");
    }

    public function AlumnoEditProfile($request) {
    
       $edited = Alumno::EditProfile($request);

       if($edited){
        header("location: /alumnoDashboard");
       }
    }

    public function AlumnoEditProfileView() {
    
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Alumno/AlunmoEditProfile.php");
    }

    public function InscribirAlumno($request) {

        $inscrito = Alumno::Inscribir($request);

        if($inscrito) {
            header("location: /alumnoClases");
        }
    }

    public function DestroyInscripcion($request) {

        $borrado = Alumno::Borrar($request);

        if($borrado) {
            header("location: /alumnoClases");
        }
    }

}