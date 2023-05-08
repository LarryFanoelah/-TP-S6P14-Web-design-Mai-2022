<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function fiche($id){
        $i=explode('-',$id);
        
        $article = Contenu::find($i[0]);
        return view('fiche',[
            'rows' => $article
        ]);
    }
    public function liste(){
        $info=Contenu::all();
        return view('ListeArticle',[
            'listeArticle' => $info
        ]);
    }


}
