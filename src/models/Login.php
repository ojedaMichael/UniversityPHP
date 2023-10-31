<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Login {
    
    public static function FindOne($correo) {
        $correo = filter_var($correo, FILTER_SANITIZE_STRING);

        $pdo = DB::connect();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE CorreoElectronico = :correo");
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } 
}
