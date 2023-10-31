<?php

session_start();
$clases = $_SESSION["clases"];

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
        <div class="bg-slate-50 mt-16 border border-gray-300 rounded-md right-80 space-y-10 box-content h-60 w-80 p-4 flex flex-col justify-center items-center content-center">
        <p>Editar Clase</p>
            <form class="space-y-4" action="/editPermiso" method="post">
               
                <input class="border border-gray-300 rounded-md p-1" type="text" hidden name="id" value="<?=$permiso[0]["ID_Usuario"]?>">
                
                <input class="border border-gray-300 rounded-md p-1" type="text" readonly name="nombre" value="<?=$permiso[0]["Nombre"]?>">
                <input class="border border-gray-300 rounded-md p-1" type="text" readonly name="apellido" value="<?=$permiso[0]["Apellido"]?>">
                <input class="border border-gray-300 rounded-md p-1" type="text" readonly name="correo" value="<?=$permiso[0]["CorreoElectronico"]?>">

                <div class="flex-col flex">
                <label>Seleciona una clase:</label>
                <select class="border border-gray-300 rounded-md p-1" name="rol">
                    
                        <option value='admin'>Admin</option>
                        <option value='alumno'>Alumno</option>
                        <option value='maestro'>Maestro</option>
            
                </select>
                </div>
                
                <button class="bg-sky-500 p-1 rounded-sm text-white flex items-end " type="submit">Editar</button>
            </form>
        </div>
    </div>
</body>
</html>