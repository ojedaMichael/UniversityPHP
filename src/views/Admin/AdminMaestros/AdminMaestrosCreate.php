<?php

session_start();
$clases = $_SESSION["maestros"];

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
        <p>Crear Clase</p>
            <form class=" flex-col flex" action="/crearMaestro" method="post">

    
                <label >Correo</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="correo">

                <label >Nombre</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="nombre">

                <label >Apellido</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="apellido">

                <label >Contraseña</label>
                <input class="border border-gray-300 rounded-md p-1" type="text" name="contrasena">

                <div class="flex-col flex">
                <label>Seleciona una clase:</label>
                <select class="border border-gray-300 rounded-md p-1" name="clase">
                    <?php 
                    foreach($clases as $clase) {
                        extract($clase);?>
                        <option value="<?=$ID_Clase?>"><?=$NombreClase?></option>
                    <?php }?>    
                </select>
                </div>
                
                <button class="bg-sky-500 p-1 rounded-sm text-white flex items-end " type="submit">Crear</button>
            </form>
        </div>
    </div>
</body>
</html>