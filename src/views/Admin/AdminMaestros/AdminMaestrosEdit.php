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
        <div class="bg-slate-50 mt-16 border border-gray-300 rounded-md right-80 space-y-10 box-content h-60 w-80 p-4 flex flex-col justify-center items-center content-center">
        <p>Editar Clase</p>
            <form class="space-y-4" action="/editMaestro" method="post">
               
                <input class="border border-gray-300 rounded-md p-1" type="text" hidden name="id" value="<?=$maestro[0]["ID_Usuario"]?>">
                <input class="border border-gray-300 rounded-md p-1" type="text" hidden name="idMaestroClase" value="<?=$maestro[0]["ID_Maestro_Clase"]?>">
                
                <input class="border border-gray-300 rounded-md p-1" type="text" name="correo" value="<?=$maestro[0]["CorreoElectronico"]?>">
                <input class="border border-gray-300 rounded-md p-1" type="text" name="nombre" value="<?=$maestro[0]["Nombre"]?>">
                <input class="border border-gray-300 rounded-md p-1" type="text" name="apellido" value="<?=$maestro[0]["Apellido"]?>">

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
                
                <button class="bg-sky-500 p-1 rounded-sm text-white flex items-end " type="submit">Editar</button>
            </form>
        </div>
    </div>
</body>
</html>