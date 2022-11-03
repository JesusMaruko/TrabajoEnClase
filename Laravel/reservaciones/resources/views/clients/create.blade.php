<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="http://127.0.0.1:8000/clients" method="post">
        @csrf

        <label> Nombre: </label>
        <input type="text" name="name" placeholder="Yisus">
        <br>
        <br>
        <label> Email: </label>
        <input type="email" name="email" placeholder="example@domain.com">
        <br>
        <br>
        <label> Telefono: </label>
        <input type="text" name="phone_number" placeholder="612-XX-XXXX">

        <button type="submit"> Guardar </button>
    </form>
</body>
</html>