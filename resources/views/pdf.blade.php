<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
    <style>
        @page {
            margin: 30px;
        }

        body {
            width: 100%;
            height: 100%;
            align-content: center;
        }

        .page-break {
            page-break-after: always;
        }

        .resposta {
            margin: 5px 0px 20px 0px;
            width: 100%;
            height: 100px;
            border: 1px solid black;
        }

        .column {
            width: 50%;
            float: left;
            margin: auto;
        }

        .columns {
            Width: 100%;
            content: "";
            display: table;
            clear: both;
        }

        .tabela {
            width: 100%;
            display: inline-block;
            margin-top: 30px;
            margin-left: 80px;
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

        @foreach ($prova as $questao)
            <div>
                <span>
                    <p>{{ $i++ . ') (' . $questao['pontos'] . ' Pontos )   ' . $questao['texto'] }}</p>
                    <div class="resposta"></div>
                </span>
            </div>
        @endforeach

        <hr>
        @if ($data['Dados']['gabarito'] == 1)
            <div class="page-break"></div>
        @endif
    @endforeach


    {{-- Impressão de Gabaritos --}}
    @if ($data['Dados']['gabarito'] == 1)
        <?php
            $totalProvas = count($data['Provas']);      //Tital de provas
            $totalQuestoes = count($data['Provas'][0]); //Total de questões
        ?>

        @if ($totalQuestoes < 30)
            @for ($p = 0; $p < $totalProvas; $p++)
                @if ($p == 0 || ($p+1)%2 != 0)
                    <div class="columns">
                @endif
                <div class="column">
                    <div class="tabela">
                        <table>
                            <tr>
                                <th colspan=2>Gabarito: {{ $data['Dados']['prefixo'] . $p + 1 }}
                                    ({{ $data['Dados']['pontuacao'] }}
                                    Pontos)</th>
                            </tr>
                            <tr>
                                <th>Questão</th>
                                <th>Resposta</th>
                            </tr>
                            @for ($q = 0; $q < $totalQuestoes; $q++)
                                <tr>
                                    <td>{{ $q + 1 }}</td>
                                    <td>{{ $data['Provas'][$p][$q]['resposta'] }}</td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
                @if ($p < $totalProvas || ($p+1)%2 == 0)
                    </div>
                @endif
            @endfor
        @else
            @for ($p = 0; $p < $totalProvas; $p++)
                <div class="columns">
                    <div class="column">
                        <div class="tabela">
                            <table>
                                <tr>
                                    <th colspan=2>Gabarito: {{ $data['Dados']['prefixo'] . $p + 1 }}
                                        ({{ $data['Dados']['pontuacao'] }}
                                        Pontos)</th>
                                </tr>
                                <tr>
                                    <th>Questão</th>
                                    <th>Resposta</th>
                                </tr>
                                @for ($q = 0; $q < $totalQuestoes; $q++)
                                    @if ($q%30 == 0 && $q != 0)
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                            <div class = "column">
                                                <div class = "tabela">
                                                    <table>
                                                        <tr>
                                                            <th colspan=2>Gabarito: {{ $data['Dados']['prefixo'] . $p + 1 }}
                                                                ({{ $data['Dados']['pontuacao'] }}
                                                                Pontos)</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Questão</th>
                                                            <th>Resposta</th>
                                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{ $q + 1 }}</td>
                                        <td>{{ $data['Provas'][$p][$q]['resposta'] }}</td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            @endfor
        @endif
    @endif

</body>

</html>
