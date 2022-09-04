<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>

<body>
    <!-- Questões de Adição Simples -->
    @if (array_key_exists('AddFacil', $data))
        <h2>Questões de Adição ( Nível Fácil )</h2>
        <hr>
        @foreach ($data['AddFacil'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif
    @if (array_key_exists('AddIntermediario', $data))
        <h2>Questões de Adição ( Nível Intermediário )</h2>
        <hr>
        @foreach ($data['AddIntermediario'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif
    @if (array_key_exists('AddAvancado', $data))
        <h2>Questões de Adição ( Nível Avançado )</h2>
        <hr>
        @foreach ($data['AddAvancado'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif

    <!-- Questões de Subtração Simples -->
    @if (array_key_exists('SubFacil', $data))
        <h2>Questões de Subtração ( Nível Fácil )</h2>
        <hr>
        @foreach ($data['SubFacil'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif
    @if (array_key_exists('SubIntermediario', $data))
        <h2>Questões de Subtração ( Nível Intermediário )</h2>
        <hr>
        @foreach ($data['SubIntermediario'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
            <p>Resposta: {{ $value['resposta'] }}</p>
        @endforeach
        <hr>
    @endif
    @if (array_key_exists('SubAvancado', $data))
        <h2>Questões de Subtração ( Nível Avançado )</h2>
        <hr>
        @foreach ($data['SubAvancado'] as $key => $value)
            <p>{{ $value['texto'] }}</p>
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
