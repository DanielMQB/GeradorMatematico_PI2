<?php

namespace App\Services;

class TestService{
    public static function teste(){
        $var2 = [
            'questoes' => [
                0 => [
                    'texto' => 'texto da questão 1',
                    'resposta' => 'resposta da questão 1'
                ],
                1 => [
                    'texto' => 'texto da questão 2',
                    'resposta' => 'resposta da questão 2'
                ],
                2 => [
                    'texto' => 'texto da questão 3',
                    'resposta' => 'resposta da questão 3'
                ],
                3 => [
                    'texto' => 'texto da questão 4',
                    'resposta' => 'resposta da questão 4'
                ],
            ]
        ];

        $var2['questoes'][4] = [
            'texto' => 'texto da questão 5',
            'resposta' => 'resposta da questão 5'
        ];

        array_push($var2['questoes'], [
            'texto' => 'texto da questão 6',
            'resposta' => 'resposta da questão 6'
        ]);

        dd($var2);


        return $var2;
    }
}
