<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>
<body>
    {{-- foreach ($data['questoes'] as $key => $value) {
        dd($value['texto']);
    } --}}
    @foreach ($data['questoes'] as $key => $value)
        <p>Texto: {{ $value['texto'] }}</p>
        <p>Resposta: {{ $value['resposta'] }}</p>
    @endforeach
</body>
</html>
