<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Services\{
    TestService,
    SomaService,
    SubService
};

class OperationsController extends Controller
{
    public function index(){
        return view('index');
    }

    public function generate(Request $request){
        //Dados Gerais
        $totalProvas = $request->get('totalAvaliacoes');
        $nomeInstituto = strtoupper($request->nomeInstituto);
        $titulo = ucwords(strtolower($request->tituloProva));
        $prefixo = strtoupper($request->prefixoProva);
        $professor = ucwords(strtolower($request->nomeProfessor));

        //Informações de Questão
        $tipo = $request->get('tipo');
        $quantidade = $request->get('quantidade');
        $nivel = $request->get('nivel');

        $tamanho = count($tipo); //Determina o total de grupos de questões adicionados

        $data = [];

        //Inserindo dados gerais de prova
        $data["Dados"] = [
            "totalProvas" => $totalProvas,
            "nomeInstituto" => $nomeInstituto,
            "titulo" => $titulo,
            "prefixo" => $prefixo,
            "professor" => $professor
        ];

        //Iniciando índice de modelos de prova
        $provas = "Provas";
        $data[$provas] = [];

        for($j=0;$j < $totalProvas; $j++){
            $prova = $j;
            $data[$provas][$prova] = [];
            for($i=0; $i < $tamanho; $i++){
                // $data = TestService::teste($tipo, $quantidade, $nivel, $data);
                if($tipo[$i] == 'Add'){
                    $questoes = SomaService::selecionaOp($tipo[$i], $nivel[$i], $quantidade[$i]);
                    for($k = 0; $k < $quantidade[$i]; $k++){
                        array_push($data[$provas][$prova], $questoes[$k]);
                    }
                }else if($tipo[$i] == 'Sub'){
                    $questoes = SubService::selecionaOp($tipo[$i], $nivel[$i], $quantidade[$i]);
                    for($k = 0; $k < $quantidade[$i]; $k++){
                        array_push($data[$provas][$prova], $questoes[$k]);
                    }
                }
            }
        }

        // dd(count($data["Provas"]));

        $pdf = Pdf::loadView('pdf', compact('data'));
        // $pdf = Pdf::loadHTML($data);
        return $pdf->stream();
    }
}
