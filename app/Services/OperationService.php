<?php

namespace App\Services;

class OperationService
{

    public static function selecionaOp($tipo, $nivel, $quantidade,  $data)
    {
        if ($tipo == "Add" && $nivel == 1) {
            $data = OperationService::addFacil($quantidade, $data);
            return $data;
        }
    }

    public static function addFacil($quantidade, $data)
    {
        //criando array que armazena string das questões e suas respostas
        $tipo = 'AddFacil';
        $data[$tipo] = [];

        for ($i = 0; $i < $quantidade; $i++) {
            //número da questão
            //$indice = count($data[$tipo])+1;

            //gerando questão (soma fácil)
            $valores[0] = rand(1, 20);
            $valores[1] = rand(1, 20);

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
}
