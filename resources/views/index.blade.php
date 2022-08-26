<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerador de Questões</title>
</head>
<body>
    <form action="{{ route('operations.generate') }}" method="POST">
        @csrf
        <input type="text" name="teste" id="teste">
        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>
