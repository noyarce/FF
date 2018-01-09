<?php

namespace App\Http\Controllers;


use App\Arriendo;
use App\ArriendoDetalle;
use App\ArriendoEstado;
use App\Cotizacion;
use App\CotizacionDetalle;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PdfController extends Controller{

    public function index()
    {
        $cot = Cotizacion::all();
        return view('pdf.index')->with('cotizaciones',$cot);
    }


    public function imprimirCotizacion($id){
        $cotizacion = Cotizacion::FindOrFail($id);
        $detalles = CotizacionDetalle::detalle($id);
        $view =  \View::make('cotizacion.print', compact('cotizacion','detalles'))->render();
        $pdf = \App::make('dompdf.wrapper');;
        $pdf->loadHTML($view)->setPaper('a4');
        return $pdf->download('cotizacion.pdf');
    }

    public function imprimirArriendo($id){
        $arriendo = Arriendo::FindOrFail($id);
        $detalles = ArriendoDetalle::detalle($id);
        $estado = ArriendoEstado::estado($id);
        $view =  \View::make('arriendo.print', compact('arriendo','detalles','estado'))->render();
        $pdf = \App::make('dompdf.wrapper');;
        $pdf->loadHTML($view)->setPaper('a4');
        return $pdf->download('Arriendo.pdf');
    }

    public function ImprimirArriendosHoy(){
         $arriendos = Arriendo::hoy();
        $juegos = Arriendo::juegosHoy();
        $view =  \View::make('arriendo.print_hoy', compact('arriendos','juegos'))->render();
        $pdf = \App::make('dompdf.wrapper');;
        $pdf->loadHTML($view)->setPaper('a4','landscape');
        return $pdf->download('ArriendosHoy.pdf');
    }




}
