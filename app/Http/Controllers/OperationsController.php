<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Services\{
    TestService,
    OperationService
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
        $data = OperationService::selecionaOp($tipo, $nivel, $quantidade, $data);
        $pdf = Pdf::loadView('pdf', compact('data'));
        // $pdf = Pdf::loadHTML($data);
        return $pdf->stream();
    }
}
