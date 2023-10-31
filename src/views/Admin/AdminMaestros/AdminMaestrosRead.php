<?php

session_start();
$dataMaestros = $_SESSION["maestros"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="flex shadow-2x1">
        <div class="h-screen w-[20%] flex-vol bg-[#353a40] shadow-2xl">
            <div class=" h-10 flex items-center space-x-3 border-b-2 border-gray-500">
                <img class="w-[2rem] rounded-[50%]" src="../../../assets/logo.jpg">
                <h1 class="text-[#babcc9]">universidad</h1>
            </div>
            <div class=" border-b border-gray-500">
                <h1 class="text-[#babcc9] m-2 text-lg">Admin</h1>
                <h2 class="text-[#babcc9] m-2 text-sm">Administrador</h2>
            </div>
            <div class="flex justify-center content-center">
                <h1 class="text-[#babcc9] text-[10px] font-bold mt-4">MENU ADMINISTRACION</h1>
            </div>
            <div class="">
                <div class="flex justify-center content-center">
                    <a href="/adminPermisosRead" class="text-[#babcc9] text-[10px] font-semibold mt-4 ">Permisos</a>
                </div>
                <div class="flex justify-center content-center">
                    <a href="/adminMaestrosRead" class="text-[#babcc9] text-[10px] font-semibold mt-4 ">Maestros</a>
                </div>
                <div class="flex justify-center content-center">
                    <a href="/adminAlunmosRead" class="text-[#babcc9] text-[10px] font-semibold mt-4 ">Alunmos</a>
                </div>
                <div class="flex justify-center content-center">
                    <a href="/adminClasesRead" class="text-[#babcc9] text-[10px] font-semibold mt-4 ">clases</a>
                </div>
            </div>
        </div>
        <div class="w-screen bg-[#f5f6fa] shadow-2x1">
            <div class="bg-white h-10 shadow-2x1 flex justify-between items-center ">
                <div>
                <a href="/adminDashboard" class="text-slate-400 text-sm font-semibold ml-6">Home</a>
                </div>
                <div>
                    <h2 class="text-slate-400 text-sm font-semibold mr-3">Administrador</h2>
                </div>
            </div>
            <div class="bg-slate-300 h-screen pt-4">

                <div class="flex justify-between ">
                    <h1 class="ml-5 mb-5">lista de maestros</h1>

                    
                </div>

                <div class="bg-white ml-5 rounded-md w-[95%] overflow-y-auto p-3 shadow-xl">
                    <div class="overflow-y-auto max-h-[70vh]">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="ltr:text-left rtl:text-right">
                                <tr>
                                
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        ID
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Nombre del maestro
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Apellido del maestro
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Correo del maestro
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Clase Asignada
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        
                                        <a href="/adminMaestroCreateView" class="inline-block rounded w-10 px-4 text-sky-600 hover:text-sky-300 text-center"><span class="material-symbols-outlined">add_box</span></a>
                                    
                                    </th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                <?php
                                foreach($dataMaestros as $maestros) {
                                    extract($maestros); ?>

                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><?= $ID_Maestro ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?=$Nombre ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $Apellido ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $CorreoElectronico ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $NombreClase ?></td>
                                        <td class="whitespace-nowrap px-4 py-2">
                                            <div class="flex">
                                                <form action="/destroyMaestro" method="post">
                                                    <button type="submit" name="clase_id" value="<?=$ID_Usuario ?> " class="inline-block rounded  px-4 text-red-600 hover:text-red-300 text-center">
                                                        <span class="material-symbols-outlined">delete</span>
                                                    </button>
                                                </form>

                                                <a href="/adminMaestroEditView?id=<?=$ID_Maestro?>" class="inline-block rounded w-10 px-4 text-sky-600 hover:text-sky-300 text-center">
                                                    <span class="material-symbols-outlined ">edit</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                };
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html