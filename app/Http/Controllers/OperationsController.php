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

        $tamanho = count($tipo);
        $data = [];

        for($i=0; $i < $tamanho; $i++){
            // $data = TestService::teste($tipo, $quantidade, $nivel, $data);
            if($tipo[$i] == 'Add'){
                $data = SomaService::selecionaOp($tipo[$i], $nivel[$i], $quantidade[$i], $data);
            }else if($tipo[$i] == 'Sub'){
                $data = SubService::selecionaOp($tipo[$i], $nivel[$i], $quantidade[$i], $data);
            }
        }

        $pdf = Pdf::loadView('pdf', compact('data'));
        // $pdf = Pdf::loadHTML($data);
        return $pdf->stream();
    }
}
