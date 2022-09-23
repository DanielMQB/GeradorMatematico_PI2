<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
    <style>
        .page-break{
            page-break-after: always;
        }
    </style>
</head>

<body>
    {{-- Impressão de Provas --}}
    <?php
        $p = 1;

    ?>
    @foreach ($data["Provas"] as $prova )
        <?php
            $i = 1;
        ?>

        <h4>{{ $data["Dados"]["nomeInstituto"]}}</h4>
        <h3>{{ $data["Dados"]["titulo"]}} -- {{$data["Dados"]["prefixo"]}}{{$p++}}</h3>
        <h3>Professor: {{ $data["Dados"]["professor"] }}</h3>
        <p>Nome do Aluno: ________________ Número:___</p>

        @foreach ($prova as $questao)
            <p>{{ $i++.') '.$questao['texto'] }}</p>
        @endforeach

        <hr>
        <div class="page-break"></div>
    @endforeach


    {{-- Impressão de Gabaritos --}}
    <?php
        $j = 1;
        $totalProvas = count($data["Provas"]);

        ?>
    @for ($p = 0; $p < $totalProvas; $p++)
    <?php
            $i=1;
            ?>

<hr>
<h1>Prova {{ $j++ }} : Gabarito</h1>

<?php
            $totalQuestoes = count($data["Provas"][$totalProvas-1]);
        ?>
        @for ($q = 0; $q < $totalQuestoes; $q++)
            <p>{{ $i++.') R: '.$data["Provas"][$p][$q]['resposta'] }}</p>
        @endfor

        <hr>

        @if ($p != $totalProvas-1)
            <div class="page-break"></div>
        @endif

    @endfor
</body>

</html>
