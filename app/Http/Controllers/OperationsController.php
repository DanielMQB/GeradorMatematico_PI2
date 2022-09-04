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

        // dd($tipo);

        $data = [];
        // $data = TestService::teste($tipo, $quantidade, $nivel, $data);
        if($tipo == 'Add'){
            $data = SomaService::selecionaOp($tipo, $nivel, $quantidade, $data);
        }else if($tipo == 'Sub'){
            $data = SubService::selecionaOp($tipo, $nivel, $quantidade, $data);
        }
        $pdf = Pdf::loadView('pdf', compact('data'));
        // $pdf = Pdf::loadHTML($data);
        return $pdf->stream();
    }
}
