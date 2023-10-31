<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/Admin.php");

class AdminController{
    
    public function AdminMaestrosRead() {
        $dataMaestros = Admin::ClasesRead();
        session_start();
        $_SESSION["maestros"] = $dataMaestros;

        header("location: /adminMaestroReadView");
    }

    public function AdminMaestroReadView() {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminMaestros/AdminMaestrosRead.php");
    }


    public function AdminDashboard() {

        $allData = Admin::All();

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminDashboard.php");
    }

    public function AdminAlunmosRead() {
        $dataAlumnos = Admin::AlumnoRead();

        foreach ($dataAlumnos as $alumnos) {
           var_dump($alumnos) ;
        }; 

        session_start();
        $_SESSION["alumnos"] = $dataAlumnos;
        header("location: /adminAlumnosReadView");
        
    }

    public function DestroyAlumno($id) {

       $deleted = Admin::Delete($id);

        if ($deleted) {
            header("location: /adminAlunmosRead");
        }
    }

    public function DestroyClase($id) {

       $deleted = Admin::DeleteClase($id);

        if ($deleted) {
            header("location: /adminClasesRead");
        }
    }

    public function DestroyMaestro($id) {

       $deleted = Admin::DeleteMaestro($id);

        if ($deleted) {
            header("location: /adminMaestrosRead");
        }
    }

    public function EditAlumno($request) {

        $edited = Admin::Edit($request);

        if ($edited) {
            header("location: /adminAlunmosRead");
        }
    }

    public function EditClase($request) {

        $edited = Admin::EditClase($request);

        if ($edited) {
            header("location: /adminClasesRead");
        }
    }

    public function EditMaestro($request) {

        $edited = Admin::EditTeacher($request);

        if ($edited) {
            header("location: /adminMaestrosRead");
        }
    }

    public function EditPermiso($request) {

        $edited = Admin::EditPermiso($request);

        if ($edited) {
            header("location: /adminPermisosRead");
        }
    }

    public function CrearAlumno($request) {

        $created = Admin::Create($request);

        if ($created) {
            header("location: /adminAlunmosRead");
        }
    }

    public function CrearClase($request) {

        $created = Admin::CreateClass($request);

        if ($created) {
            header("location: /adminClasesRead");
        }
    }

    public function CrearMaestro($request) {

        $created = Admin::CreateTeacher($request);

        if ($created) {
            header("location: /adminClasesRead");
        }
    }


    public function AdminAlumnosReadview(){

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminAlumnos/AdminAlunmosRead.php");

    }
    
    public function AdminAlumnosCreateView(){

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminAlumnos/AdminAlunmosCreate.php");

    }

    public function AdminClasesCreateView(){

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminClases/AdminClasesCreate.php");

    }

    public function AdminMaestroCreateView(){

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminMaestros/AdminMaestrosCreate.php");

    }

    public function AdminMaestroEditView($id) {
        
        $maestro = Admin::findMaestro($id);
        extract($maestro[0]);

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminMaestros/AdminMaestrosEdit.php");
    }

    public function AdminPermisosEditView($id) {
        
        $permiso = Admin::FindUsers($id);
        extract($permiso[0]);

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminPermisos/AdminPermisosEdit.php");
    }

    public function AdminAlumnosEditView($id) {
        
        $alumno = Admin::findUsers($id);
        extract($alumno[0]);

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminAlumnos/AdminAlumnosEdit.php");
    }

    public function AdminClasesEditView($id) {
        
        $clase = Admin::findClase($id);
        extract($clase[0]);

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminClases/AdminClasesEdit.php");
    }

    public function AdminPermisosRead() {

        $dataUsuarios = Admin::UsuariosRead();
        session_start();
        $_SESSION["usuarios"] = $dataUsuarios;
    
        header("location: /adminPermisosReadView");
    }

    public function AdminPermisosReadView() {

        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminPermisos/AdminPermisosRead.php");
    }

    public function AdminClasesReadView() {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/src/views/Admin/AdminClases/AdminClasesRead.php");
    }

    public function AdminClasesRead() {

        $dataClases = Admin::ClasesRead();
        session_start();
        $_SESSION["clases"] = $dataClases;

        header("location: /adminClasesReadView");
    }

}