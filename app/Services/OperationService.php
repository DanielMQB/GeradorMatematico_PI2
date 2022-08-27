<?php

namespace App\Services;

class TestService{

    public static function selecionaOp($tipo, $nivel, $quantidade,  $data){
        if($tipo == "Add" && $nivel == 1){

        }
    }

    public static function addFacil($quantidade, $data){
        //criando array com as questões e respectivas respostas
        $data[$tipo] = [];

        //método genérico de geração de operações (somente texto)
        for($i=0; $i<$quantidade;$i++){
            $indice = count($data[$tipo])+1;

            array_push($data[$tipo], [
                'texto' => 'texto da questão '.$indice. ' (Nível: '.$nivel.' ).',       //3 + 4
                'resposta' => 'resposta da questão '.$indice  // 7
            ]);
        }

        //Teste p/ operações múltiplas
        $data['Sub'] = [];
        $indice = count($data['Sub'])+1;
        array_push($data['Sub'], [
            'texto' => 'texto da questão '.$indice. ' (Nível: '.$nivel.' ).',       //3 + 4
            'resposta' => 'resposta da questão '.$indice  // 7
        ]);

        dd($data);
        return $data;

        // $var2 = [
        //     'questoes' => [
        //         0 => [
        //             'texto' => 'texto da questão 1',
        //             'resposta' => 'resposta da questão 1'
        //         ],
        //         1 => [
        //             'texto' => 'texto da questão 2',
        //             'resposta' => 'resposta da questão 2'
        //         ],
        //         2 => [
        //             'texto' => 'texto da questão 3',
        //             'resposta' => 'resposta da questão 3'
        //         ],
        //         3 => [
        //             'texto' => 'texto da questão 4',
        //             'resposta' => 'resposta da questão 4'
        //         ],
        //     ]
        // ];

        // $var2['questoes'][4] = [
        //     'texto' => 'texto da questão 5',
        //     'resposta' => 'resposta da questão 5'
        // ];

        // array_push($var2['questoes'], [
        //     'texto' => 'texto da questão 6',
        //     'resposta' => 'resposta da questão 6'
        // ]);

        // dd($var2);


        // return $var2;
    }
}
