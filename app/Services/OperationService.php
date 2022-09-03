<?php

namespace App\Services;

class OperationService
{

    public static function selecionaOp($tipo, $nivel, $quantidade,  $data)
    {
        if ($tipo == "Add" && $nivel == 1) {
            $data = OperationService::addFacil($quantidade, $data);
            return $data;
        }else if ($tipo == "Add" && $nivel == 2) {
            $data = OperationService::addIntermediario($quantidade, $data);
            return $data;
        }else if ($tipo == "Add" && $nivel == 3) {
            $data = OperationService::addAvancado($quantidade, $data);
            return $data;
        }
    }

    public static function addFacil($quantidade, $data)
    {
        //criando array que armazena string das questões e suas respostas
        $tipo = 'AddFacil';
        $data[$tipo] = [];

        //Array auxiliar para verificar valores gerados em cada questão
        $gerado_num_1 = [];
        $gerado_num_2 = [];


        for ($i = 0; $i < $quantidade; $i++) {

            $gerados[$i] = [];

            $valida = false;

            while(!$valida){
                //gerando valores da questão (soma fácil, dois valores inteiros de 1 a 20)
                $valores[0] = rand(1, 20);
                $valores[1] = rand(1, 20);

                if ((in_array($valores[0], $gerado_num_1) && in_array($valores[1], $gerado_num_2)) ||
                    (in_array($valores[1], $gerado_num_1) && in_array($valores[0], $gerado_num_2))) {
                        $valida = false;
                } else {
                    $valida = true;
                }

            }

                //Armazenando valores gerados em vetor auxiliar
                array_push($gerado_num_1,
                    $valores[0]
                );

                array_push($gerado_num_2,
                    $valores[1]
                );



                //Comparando com valores gerados anteriormente
                //$valida = OperationService::validaValores($gerados, $valores);

            //Escrevendo texto para impressão
            $texto = ($i + 1) . ') ';

            //verificando se a questão gerada já existe
            $aux = OperationService::geraTexto($valores);

            $texto = $texto . $aux;


            //gerando resultado
            $res = OperationService::soma($valores);

            //inserindo questão no array
            array_push($data[$tipo], [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        // dd($data);
        return $data;
    }

    public static function addIntermediario($quantidade, $data){
        //criando array que armazena string das questões e suas respostas
        $tipo = 'AddIntermediario';
        $data[$tipo] = [];

        for ($i = 0; $i < $quantidade; $i++) {
            //número da questão
            //$indice = count($data[$tipo])+1;

            //gerando questão (soma intermediária, três valores inteiros de 1 a 5000)
            $valores[0] = rand(1, 5000);
            $valores[1] = rand(1, 5000);
            $valores[2] = rand(1, 5000);

            //Escrevendo texto para impressão
            $texto = ($i + 1) . ') ';
            $aux = OperationService::geraTexto($valores);
            $texto = $texto . $aux;

            //gerando resultado
            $res = OperationService::soma($valores);

            //inserindo questão no array
            array_push($data[$tipo], [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        // dd($data);

        return $data;
    }

    public static function addAvancado($quantidade, $data){
        //criando array que armazena string das questões e suas respostas
        $tipo = 'AddAvancado';
        $data[$tipo] = [];

        for ($i = 0; $i < $quantidade; $i++) {
            //número da questão
            //$indice = count($data[$tipo])+1;

            //gerando questão (soma intermediária, cinco valores inteiros de 1 a 5000)
            $valores[0] = rand(1, 5000);
            $valores[1] = rand(1, 5000);
            $valores[2] = rand(1, 5000);
            $valores[3] = rand(1, 5000);
            $valores[4] = rand(1, 5000);

            //Escrevendo texto para impressão
            $texto = ($i + 1) . ') ';
            $aux = OperationService::geraTexto($valores);
            $texto = $texto . $aux;

            //gerando resultado
            $res = OperationService::soma($valores);

            //inserindo questão no array
            array_push($data[$tipo], [
                'texto' => $texto,
                'resposta' => $res
            ]);
        }

        // dd($data);
        return $data;
    }

    public static function soma($valores)
    {
        $soma = 0;

        for($i=0; $i < count($valores); $i++){
            $soma += $valores[$i];
        }

        return $soma;
    }

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

    public static function validaValores($gerados,$valores){
        foreach($gerados as $aux){
            sort($aux);
            sort($valores);
            dd($aux, $valores);
            if($aux == $valores){
                return false;
            }
        }
        return true;
    }
}
