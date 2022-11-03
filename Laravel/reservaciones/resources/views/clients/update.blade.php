<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('clients/')}}" method="post">
        @method('PUT')
        @csrf

        <label> Nombre: </label>
        <input type="text" name="name" value="{{$client->name}}">
        <br>
        <br>
        <label> Email: </label>
        <input type="email" name="email" value="{{$client->email}}">
        <br>
        <br>
        <label> Telefono: </label>
        <input type="text" name="phone_number" value="{{$client->phone_number}}">
        <input type="hidden" name="id" value="{{$client->id}}">

        <button type="submit"> Actualizar </button>
    </form>
</body>
</html>