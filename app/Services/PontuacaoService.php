<?php

namespace App\Services;

class PontuacaoService
{
    public static function calculaPont($peso){
        $pontuacao = 0;
        for($i = 0; $i < count($peso); $i++){
            $pontuacao += $peso[$i]*10;
        }
        return $pontuacao;
    }
}
