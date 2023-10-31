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
        <p>Editar alumno</p>
            <form class="space-y-4" action="/editAlumno" method="post">
               
                <input type="text" hidden name="id" value="<?=$alumno[0]["ID_Usuario"]?>">

                <input class="border border-gray-300 rounded-md p-1" type="text" name="nombre" value="<?=$alumno[0]["Nombre"]?>">
                

                <input class="border border-gray-300 rounded-md p-1" type="text" name="apellido" value="<?=$alumno[0]["Apellido"]?>">
                <input class="border border-gray-300 rounded-md p-1" type="text" name="correo" value="<?=$alumno[0]["CorreoElectronico"]?>">
                

                <button class="bg-sky-500 p-1 rounded-sm text-white flex items-end " type="submit">Editar</button>
            </form>
        </div>
    </div>
</body>
</html>