<?php

namespace App\Http\Controllers;

use App\Models\pesertadidikM;
use Illuminate\Http\Request;
use PDF;

class PesertadidikPDF extends Controller
{
    public function pdf (){
        $pesertaM = pesertadidikM::all();
        return view('pesertadidik_pdf', compact('pesertaM'));
        //$pdf = PDF::loadview('pesertadidik_pdf',
        //['peserta' => $pesertaM]);
        //return $pdf->stream('pesertadidik.pdf');
    }
}
