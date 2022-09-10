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
        $tipo = $request->get('tipo');
        $quantidade = $request->get('quantidade');
        $nivel = $request->get('nivel');
        $avaliacaoQtd = $request->get('totalAvaliacoes');

        $tamanho = count($tipo);
        $data = [];

        for($j=0;$j < $avaliacaoQtd; $j++){
            $prova = "Prova ".$j;
            $data[$prova] = [];
            for($i=0; $i < $tamanho; $i++){
                // $data = TestService::teste($tipo, $quantidade, $nivel, $data);
                if($tipo[$i] == 'Add'){
                    $data[$prova] += SomaService::selecionaOp($tipo[$i], $nivel[$i], $quantidade[$i], $data[$prova]);
                }else if($tipo[$i] == 'Sub'){
                    $data[$prova] += SubService::selecionaOp($tipo[$i], $nivel[$i], $quantidade[$i], $data[$prova]);
                }
            }
        }
        dd($data);

        $pdf = Pdf::loadView('pdf', compact('data'));
        // $pdf = Pdf::loadHTML($data);
        return $pdf->stream();
    }
}
