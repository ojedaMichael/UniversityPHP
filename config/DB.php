<?php

class DB {
    public static function connect() {
        $dsn = "mysql:host=localhost;dbname=university_db";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Configuración de error
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Modo de recuperación de datos predeterminado
        ];

        $pdo = new PDO($dsn, "root", "", $options);

        return $pdo;
    }

    public static function query($string) {
        $pdo = DB::connect();
        $res = $pdo->query($string);

        return $res;
    }
}
