<?php

session_start();
$dataPersonales = $_SESSION["user"];
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
    <div class="flex shadow-2x1">
        <div class="h-screen w-[20%] flex-vol bg-[#353a40] shadow-2xl">
            <div class=" h-10 flex items-center space-x-3 border-b-2 border-gray-500">
                <img class="w-[2rem] rounded-[50%]" src="../../../assets/logo.jpg">
                <h1 class="text-[#babcc9]">universidad</h1>
            </div>
            <div class=" border-b border-gray-500">
                <h1 class="text-[#babcc9] m-2 text-lg">Maestro</h1>
                <h2 class="text-[#babcc9] m-2 text-sm"><?=$Nombre?> <?=$Apellido?></h2>
            </div>
            <div class="flex justify-center content-center">
                <h1 class="text-[#babcc9] text-[10px] font-bold mt-4">MENU MAESTRO</h1>
            </div>
            <div class="">
                <div class="flex justify-center content-center">
                    <a href="/maestroAlumnosRead" class="text-[#babcc9] text-[10px] font-semibold mt-4 ">Alumnos</a>
                </div>
            </div>
        </div>
        <div class="w-screen bg-[#f5f6fa] shadow-2x1">
            <div class="bg-white h-10 shadow-2x1 flex justify-between items-center ">
                <div>
                    <h2 class="text-slate-400 text-sm font-semibold ml-6">Home</h2>
                </div>
                <div>
                    <h2 class="text-slate-400 text-sm font-semibold mr-3"><?=$Nombre?> <?=$Apellido?></h2>
                </div>
            </div>
            <div class="bg-slate-300 h-screen pt-4">
                <div class="flex justify-between ">
                    <h1 class="ml-5 mb-5">Dashboard</h1>
                    <div class="w-[7rem] flex-col bg-white  rounded-md shadow-xl">
                        <div><a href="/maestroEditProfileView">Edit profile</a></div>
                        <div><a href="/logout">Logout</a></div>
                    </div>
                </div>
                
                <div class="bg-white ml-5 rounded-md w-[70%] p-3 shadow-xl">
                    <h1 class="text-[#6c6c6d] font-semibold">Bienvenido</h1>
                    <p class="text-[#6c6c6d] font-semibold">Selecciona la accion que quieras realizar en las pestañas del menu de la izquierda</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html