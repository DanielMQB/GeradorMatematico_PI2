<?php

namespace App\Services;

class SomaService
{

    public static function selecionaOp($tipo, $nivel, $quantidade)
    {
        $questoes = [];

        if ($tipo == "Add" && $nivel == 1) {
            $questoes = SomaService::addFacil($quantidade, $questoes);
            return $questoes;
        }else if ($tipo == "Add" && $nivel == 2) {
            $questoes = SomaService::addIntermediario($quantidade, $questoes);
            return $questoes;
        }else if ($tipo == "Add" && $nivel == 3) {
            $questoes = SomaService::addAvancado($quantidade, $questoes);
            return $questoes;
        }
    }

    //gerando questões (soma fácil, dois valores inteiros de 1 a 99)
    public static function addFacil($quantidade, $questoes)
    {
        //Array auxiliar para verificar valores gerados em cada questão
        $gerados = [];
        //Método de validação manual (criando vetores para números gerados)
        // $gerado_num_1 = [];
        // $gerado_num_2 = [];


        for ($i = 0; $i < $quantidade; $i++) {
            //variáveis auxiliares para validação
            $gerados[$i] = [];
            $valida = false;

            while(!$valida){
                $valores[0] = rand(1, 99);
                $valores[1] = rand(1, 99);

                $valida = SomaService::validaValores($gerados, $valores);

                //Método de validação manual (Verificando repetições)
                // if ((in_array($valores[0], $gerado_num_1) && in_array($valores[1], $gerado_num_2)) ||
                //     (in_array($valores[1], $gerado_num_1) && in_array($valores[0], $gerado_num_2))) {
                //         $valida = false;
                // } else {
                //     $valida = true;
                // }

            }

            //Armazenando valores gerados em vetor auxiliar
            array_push($gerados[$i],
                $valores[0],
                $valores[1]
            );

            //Método de validação manual (armazenando em vetor de gerados)
            //dd($gerados);
            // array_push($gerado_num_1,
            //     $valores[0]
            // );

            // array_push($gerado_num_2,
            //     $valores[1]
            // );

            //Escrevendo texto para impressão
            $texto = SomaService::geraTexto($valores);

            //gerando resultado
            $res = SomaService::soma($valores);

            //inserindo questão no array
            array_push($questoes, [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        return $questoes;
    }

    //gerando questões (soma intermediária, três valores inteiros de 1 a 999)
    public static function addIntermediario($quantidade, $questoes){

        //Array auxiliar para verificar valores gerados em cada questão
        $gerados = [];

        for ($i = 0; $i < $quantidade; $i++) {
            //variáveis auxiliares para validação
            $gerados[$i] = [];
            $valida = false;

            while(!$valida){
                $valores[0] = rand(1, 999);
                $valores[1] = rand(1, 999);
                $valores[2] = rand(1, 999);

                $valida = SomaService::validaValores($gerados, $valores);
            }

            array_push($gerados[$i],
                $valores[0],
                $valores[1],
                $valores[2]
            );

            //Escrevendo texto para impressão
            $texto = SomaService::geraTexto($valores);

            //gerando resultado
            $res = SomaService::soma($valores);

            //inserindo questão no array
            array_push($questoes, [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        return $questoes;
    }

    //gerando questões (soma avançada, cinco valores inteiros de 1 a 9999)
    public static function addAvancado($quantidade, $questoes){
        //Array auxiliar para verificar valores gerados em cada questão
        $gerados = [];

        for ($i = 0; $i < $quantidade; $i++) {
            //variáveis auxiliares para validação
            $gerados[$i] = [];
            $valida = false;

            while(!$valida){
                $valores[0] = rand(1, 9999);
                $valores[1] = rand(1, 9999);
                $valores[2] = rand(1, 9999);
                $valores[3] = rand(1, 9999);
                $valores[4] = rand(1, 9999);

                $valida = SomaService::validaValores($gerados, $valores);
            }

            array_push($gerados[$i],
                $valores[0],
                $valores[1],
                $valores[2]
            );

            //Escrevendo texto para impressão
            $texto = SomaService::geraTexto($valores);

            //gerando resultado
            $res = SomaService::soma($valores);

            //inserindo questão no array
            array_push($questoes, [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        return $questoes;
    }

    /*
    Função de soma para N valores gerados
    */
    public static function soma($valores)
    {
        $soma = 0;

        for($i=0; $i < count($valores); $i++){
            $soma += $valores[$i];
        }

        return $soma;
    }

    /*
    Gera a string pronta da questão a partir dos valores gerados
    */
    public static function geraTexto($valores)
    {
        $texto = '';
        for ($i = 0; $i < count($valores); $i++) {
            if ($i < count($valores) - 1) {
                $texto = $texto . $valores[$i] . ' + ';
            } else {
                $texto = $texto . $valores[$i];
            }
        }

        return $texto;
    }

    /*
    Separa os números gerados para cada questão em vetores,
    ordena esses vetores e os compara
    */
    public static function validaValores($gerados,$valores){
        foreach($gerados as $aux){
            sort($aux);
            sort($valores);
            if($aux == $valores){
                return false;
            }
        }
        return true;
    }
}
