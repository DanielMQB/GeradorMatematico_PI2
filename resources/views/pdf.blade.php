<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>

<body>
    @if (array_key_exists('AddFacil', $data))
        <h2>Questões de Adição</h2>
        <hr>
        @foreach ($data['AddFacil'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif

    @if (array_key_exists('Sub', $data))
        <h2>Questões de Subtração</h2>
        <hr>
        @foreach ($data['Sub'] as $key => $value)
            <p>Texto: {{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif

    @if (array_key_exists('Mult', $data))
        <h2>Questões de Multiplicação</h2>
        <hr>
        @foreach ($data['Mult'] as $key => $value)
            <p>Texto: {{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif

    @if (array_key_exists('Div', $data))
        <h2>Questões de Divisão</h2>
        <hr>
        @foreach ($data['Div'] as $key => $value)
            <p>Texto: {{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif
</body>

</html>
