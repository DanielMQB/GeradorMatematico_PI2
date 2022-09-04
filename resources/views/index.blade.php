<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerador de Questões</title>
</head>
<body>
    <h1>Especificações da Avaliação: </h1>
    <br>
    <form action="{{ route('operations.generate') }}" method="POST" target="_blank">
        @csrf

        <label for="tipo">Tipo de questão:</label>
        <select name="tipo" id="tipo">
            <option value="Add">Adição</option>
            <option value="Sub">Subtração</option>
            <option value="Mult">Multiplicação</option>
            <option value="Div">Divisão</option>
        </select>

        <label for="quantidade">Quantidade de questões</label>
        <input type="int" name="quantidade" id="quantidade" placeholder="Num. de questões">

        <select name="nivel" id="nivel">
            <option value="1">Fácil</option>
            <option value="2">Médio</option>
            <option value="3">Difícil</option>
        </select>

        <button type="submit">ENVIAR</button>

    </form>
</body>
</html>
