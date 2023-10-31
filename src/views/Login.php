<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="bg-[#fff5d2] flex h-screen items-center flex-col">
        <img class="w-60" src="../../assets/logo.jpg" alt="">
        <div class="bg-slate-50 border border-gray-300 rounded-md right-80 space-y-10 box-content h-60 w-80 p-4 flex flex-col justify-center items-center content-center">
        <p>Bienvenido, ingresa con tu cuenta</p>
            <form class="space-y-4" action="/login" method="post">
               
                <input class="border border-gray-300 rounded-md p-1" type="email" name="correo" placeholder="Email">
                

                <input class="border border-gray-300 rounded-md p-1" type="text" name="contrasena" placeholder="Password">
                

                <button class="bg-sky-500 p-1 rounded-sm text-white flex items-end " type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</body>

</html>