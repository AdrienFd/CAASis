<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Participate;

class PdfController extends Controller
{ 

    
    public function getParticipateList($id_event, $name){

        $data = Participate::where('id_manifestation',$id_event);
        
        
        $data = $data->get();
        
        $participants = array();

        foreach ($data as $row) {
           array_push($participants,json_decode($row->member));
            
        }
       return view('participate')->with(['data'=>$participants,'name'=>$name,'id'=>$id_event]);
    }

    public function createPDF($id_event, $name) {
        
        $data = Participate::where('id_manifestation',$id_event);
        
        $data = $data->get();
        
        $participants = array();

        foreach ($data as $row) {
           array_push($participants,json_decode($row->member));
            
        }

        $pdf = \App::make('dompdf.wrapper');
        
        $pdf->loadHTML(view('pdf.participate')->with(['data'=>$participants,'name'=>$name,'id'=>$id_event]));
    
        return $pdf->stream();
    }



}