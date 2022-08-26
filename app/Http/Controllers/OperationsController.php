<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Services\TestService;

class OperationsController extends Controller
{
    public function index(){
        return view('index');
    }

    public function generate(Request $request){
        $data = TestService::teste();
        // dd($data);
        $pdf = Pdf::loadView('pdf', compact('data'));
        // $pdf = Pdf::loadHTML($data);
        return $pdf->stream();
    }
}
