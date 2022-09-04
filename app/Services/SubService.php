<?php

namespace App\Services;

class SubService
{

    public static function selecionaOp($tipo, $nivel, $quantidade,  $data)
    {
        if ($tipo == "Sub" && $nivel == 1) {
            $data = SubService::subFacil($quantidade, $data);
            return $data;
        }else if ($tipo == "Sub" && $nivel == 2) {
            $data = SubService::subIntermediario($quantidade, $data);
            return $data;
        }else if ($tipo == "Sub" && $nivel == 3) {
            $data = SubService::subAvancado($quantidade, $data);
            return $data;
        }
    }

    //gerando questões (subtração fácil, dois valores inteiros de 1 a 99)
    public static function subFacil($quantidade, $data)
    {
        //criando array que armazena string das questões e suas respostas
        $tipo = 'SubFacil';
        $data[$tipo] = [];

        //Array auxiliar para verificar valores gerados em cada questão
        $gerados = [];

        for ($i = 0; $i < $quantidade; $i++) {
            //variáveis auxiliares para validação
            $gerados[$i] = [];
            $valida = false;

            while(!$valida){
                $valores[0] = rand(1, 99);
                $valores[1] = rand(1, 99);

                $valida = SubService::validaValores($gerados, $valores);
            }

            //Armazenando valores gerados em vetor auxiliar
            array_push($gerados[$i],
                $valores[0],
                $valores[1]
            );

            //Escrevendo texto para impressão
            $texto = ($i + 1) . ') ';

            //verificando se a questão gerada já existe
            $aux = SubService::geraTexto($valores);

            $texto = $texto . $aux;

            //gerando resultado
            $res = SubService::subtrair($valores);

            //inserindo questão no array
            array_push($data[$tipo], [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        return $data;
    }

    //gerando questões (subtração intermediária, três valores inteiros de 1 a 999)
    public static function subIntermediario($quantidade, $data){
        //criando array que armazena string das questões e suas respostas
        $tipo = 'SubIntermediario';
        $data[$tipo] = [];

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

                $valida = SubService::validaValores($gerados, $valores);
            }

            array_push($gerados[$i],
                $valores[0],
                $valores[1],
                $valores[2]
            );

            //Escrevendo texto para impressão
            $texto = ($i + 1) . ') ';
            $aux = SubService::geraTexto($valores);
            $texto = $texto . $aux;

            //gerando resultado
            $res = SubService::subtrair($valores);

            //inserindo questão no array
            array_push($data[$tipo], [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        return $data;
    }

    //gerando questões (subtração avançada, cinco valores inteiros de 1 a 9999)
    public static function subAvancado($quantidade, $data){
        //criando array que armazena string das questões e suas respostas
        $tipo = 'SubAvancado';
        $data[$tipo] = [];

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

                $valida = SubService::validaValores($gerados, $valores);
            }

            array_push($gerados[$i],
                $valores[0],
                $valores[1],
                $valores[2]
            );

            //Escrevendo texto para impressão
            $texto = ($i + 1) . ') ';
            $aux = SubService::geraTexto($valores);
            $texto = $texto . $aux;

            //gerando resultado
            $res = SubService::subtrair($valores);

            //inserindo questão no array
            array_push($data[$tipo], [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        return $data;
    }

    /*
    Função de soma para N valores gerados
    */
    public static function subtrair($valores)
    {
        $subtracao = $valores[0];

        for($i=1; $i < count($valores); $i++){
            $subtracao -= $valores[$i];
        }

        return $subtracao;
    }

    /*
    Gera a string pronta da questão a partir dos valores gerados
    */
    public static function geraTexto($valores)
    {
        $texto = '';
        for ($i = 0; $i < count($valores); $i++) {
            if ($i < count($valores) - 1) {
                $texto = $texto . $valores[$i] . ' - ';
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
