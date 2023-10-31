<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/src/controllers/AdminController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/src/controllers/AlumnoController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/src/controllers/MaestroController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/src/controllers/LoginController.php");

$controllerAdmin = new AdminController();
$controllerAlumno = new AlumnoController();
$controllerMaestro = new MaestroController();
$controllerLogin = new LoginController();

$urlCumpleta = $_SERVER["REQUEST_URI"];

$urlPartida = explode("?", $urlCumpleta);

$url = $urlPartida[0];

if ($_SERVER["REQUEST_METHOD"] === "GET" ) {
    switch ($url) {
        case '/index.php':
            $controllerLogin->index();
            break;

        case '/logout':
            $controllerLogin->Logout();
            break;

        case '/adminPermisosRead':
            $controllerAdmin->AdminPermisosRead();
            break;

        case '/adminAlumnosReadView':
            $controllerAdmin->AdminAlumnosReadView();
            break;
            
        case '/adminClasesReadView':
            $controllerAdmin->AdminClasesReadView();
            break;

        case '/adminMaestroReadView':
            $controllerAdmin->AdminMaestroReadView();
            break;

        case '/adminPermisosReadView':
            $controllerAdmin->AdminPermisosReadView();
            break;

        case '/adminAlumnosCreateView':
            $controllerAdmin->AdminAlumnosCreateView();
            break;

        case '/adminClasesCreateView':
            $controllerAdmin->AdminClasesCreateView();
            break;

        case '/adminMaestroCreateView':
            $controllerAdmin->AdminMaestroCreateView();
            break;

        case '/adminAlumnosEditView':
            $controllerAdmin->AdminAlumnosEditView($_GET["id"]);
            break;

        case '/adminClasesEditView':
            $controllerAdmin->AdminClasesEditView($_GET["id"]);
            break;

        case '/adminMaestroEditView':
            $controllerAdmin->AdminMaestroEditView($_GET["id"]);
            break;

        case '/adminPermisosEditView':
            $controllerAdmin->AdminPermisosEditView($_GET["id"]);
            break;

        case '/adminDashboard':
            $controllerAdmin->AdminDashboard();
            break;

        case '/adminMaestrosRead':
            $controllerAdmin->AdminMaestrosRead();
            break;

        case '/adminAlunmosRead':
            $controllerAdmin->AdminAlunmosRead();
            break;

        case '/adminClasesRead':
            $controllerAdmin->AdminClasesRead();
            break;

        case '/adminPermisosRead':
            $controllerAdmin->AdminPermisosRead();
            break;

        case '/alumnoDashboard':
            $controllerAlumno->AlumnoDashboard();
            break;
            
        case '/alumnoClases':
            $controllerAlumno->AlumnoClases();
            break;

        case '/alumnoClasesView':
            $controllerAlumno->AlumnoClasesView();
            break;

        case '/alumnoEditProfileView':
            $controllerAlumno->AlumnoEditProfileView();
            break;
        
        case '/maestroEditProfileView':
            $controllerMaestro->MaestroEditProfileview();
            break;

        case '/maestroDashboard':
            $controllerMaestro->MaestroDashboard();
            break;

        case '/maestroAlumnosReadView':
            $controllerMaestro->MaestroAlumnosReadView();
            break;

        case '/maestroAlumnosRead':
            $controllerMaestro->MaestroAlumnosRead();
            break;
        
        default:
            echo "no encontramos la URL";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" ) {

    switch ($url) {
        case "/login":
            $controllerLogin->Login($_POST);
            break;

        case "/destroy":
            $controllerAdmin->DestroyAlumno($_POST["alumno_id"]);
            break;

        case "/destroyClase":
            $controllerAdmin->DestroyClase($_POST["clase_id"]);
            break;

        case "/destroyMaestro":
            $controllerAdmin->DestroyMaestro($_POST["clase_id"]);
            break;

        case "/destroyInscripcion":
            $controllerAlumno->DestroyInscripcion($_POST);
            break;

        case "/editAlumno":
            $controllerAdmin->EditAlumno($_POST);
            break;

        case "/editClase":
            $controllerAdmin->EditClase($_POST);
            break;

        case "/editMaestro":
            $controllerAdmin->EditMaestro($_POST);
            break;

        case "/editPermiso":
            $controllerAdmin->EditPermiso($_POST);
            break;

        case "/alumnoEditProfile":
            $controllerAlumno->AlumnoEditProfile($_POST);
            break;

        case "/maestroEditProfile":
            $controllerMaestro->MaestroEditProfile($_POST);
            break;

        case "/crearAlumno":
            $controllerAdmin->CrearAlumno($_POST);
            break;

        case "/crearClase":
            $controllerAdmin->CrearClase($_POST);
            break;

        case "/inscribirAlumno":
            $controllerAlumno->InscribirAlumno($_POST);
            break;

        case "/crearMaestro":
            $controllerAdmin->CrearMaestro($_POST);
            break;

        case "/update":
            $controller->update($_POST);
        default:
            echo "no encontramos la URL";
    }
}