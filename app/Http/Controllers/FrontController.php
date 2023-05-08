<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    public function fiche($id){
        $i=explode('-',$id);
        $index=$i[0];
        $list=Cache::remember('fiche'.$index ,120,function () use($index){
            return Contenu::find($index);
        });
        $response = response()->view('fiche',['rows' => $list]);
        $response->header('Cache-Control','max-age=3600 , public ');
        return $response;
    }
    
    public function liste(){
        $list=Cache::remember('liste',120,function (){
            return Contenu::all();
        });
        $response = response()->view('ListeArticle',['listeArticle' => $list]);
        $response->header('Cache-Control','max-age=3600 , public ');
        return $response;
    }


}
