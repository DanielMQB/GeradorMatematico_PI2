<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
    <style>
        @page{
            margin: 30px;
        }

        body{
            width: 100%;
            height: 100%;
            align-content: center;
        }
        .page-break {
            page-break-after: always;
        }

        .tabela{
            width: 26%;
            display: inline-block;
            margin-top: 70px;
            margin-left: 37px;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid;
            padding: 3px;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    {{-- Impressão de Provas --}}
    <?php
    $p = 1;

    ?>
    @foreach ($data['Provas'] as $prova)
        <?php
        $i = 1;
        ?>

        <h4>{{ $data['Dados']['nomeInstituto'] }}</h4>
        <h3>{{ $data['Dados']['titulo'] }} -- {{ $data['Dados']['prefixo'] }}{{ $p++ }}</h3>
        <h3>Professor: {{ $data['Dados']['professor'] }}</h3>
        <p>Nome do Aluno: ________________ Número:___</p>
        <p>_______ Pontos de {{ $data['Dados']['pontuacao'] }}</p>

        @foreach ($prova as $questao)
            <p>{{ $i++ . ') (' . $questao['pontos'] . ' Pontos )   ' . $questao['texto'] }}</p>
        @endforeach

        <hr>
        <div class="page-break"></div>
    @endforeach


    {{-- Impressão de Gabaritos --}}
    <?php

    $totalProvas = count($data['Provas']);

    ?>
    @for ($p = 0; $p < $totalProvas; $p++)
        <div class = "tabela">
            <table>
                <tr>
                    <th colspan=3>Gabarito: {{ $data['Dados']['prefixo'] . $p + 1 }}</th>
                </tr>
                <tr>
                    <th>Questão</th>
                    <th>Pontos</th>
                    <th>Resposta</th>
                </tr>
                <?php
                $totalQuestoes = count($data['Provas'][$totalProvas - 1]);
                ?>
                @for ($q = 0; $q < $totalQuestoes; $q++)
                    <tr>
                        <td>{{ $q + 1 }}</td>
                        <td>{{ $data['Provas'][$p][$q]['pontos'] }}</td>
                        <td>{{ $data['Provas'][$p][$q]['resposta'] }}</td>
                    </tr>
                @endfor
            </table>
        </div>
        {{-- @if ($p != $totalProvas - 1)
            <div class="page-break"></div>
        @endif --}}

    @endfor
</body>

</html>
