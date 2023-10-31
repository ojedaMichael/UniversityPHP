<?php

session_start();
$dataPersonales = $_SESSION["user"];
$contrasena = $_SESSION["pass"];
extract($dataPersonales[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>
<body>
<div class="bg-[#fff5d2]  flex h-screen items-center flex-col">
        <div class="bg-slate-50 mt-16 border border-gray-300 rounded-md right-80 space-y-10 box-content w-80 p-4 flex flex-col justify-center items-center content-center">
        <p>Editar perfil de maestro</p>
            <form class="flex-col flex" action="/maestroEditProfile" method="post">

                <input type="text" hidden name="id" value="<?=$ID_Usuario?>">

                <label for="">Nombre</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="nombre" value="<?=$Nombre?>">
                
                <label for="">Apelido</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="apellido" value="<?=$Apellido?>">
                
                <label for="">Correo</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="correo" value="<?=$CorreoElectronico?>">
                
                <label for="">Contraseña</label>
                <input class="border border-gray-300 rounded-md p-1" type="password" name="contrasena" value="<?=$contrasena?>">

                
                
                <button class="bg-sky-500 p-1 rounded-sm text-white flex items-end " type="submit">Editar</button>
            </form>
        </div>
    </div>
</body>
</html>