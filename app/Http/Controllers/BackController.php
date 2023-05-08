<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Contenu;
use Illuminate\Http\Request;


class BackController extends Controller
{
    

    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $input=$request->input();
        $identifiant=$input['email'];
        $mdp=$input['mdp'];

        $admin=Administrateur::where('email','=',$identifiant)->first();
        if($admin!=null ){
            if(strcmp($admin->mdp,$mdp)==0)
                return $this->liste();
            else{
                return view('login',[
                    'erreur' => 'Mot de passe incorrecte'
                ]);
            }
        }
        else{
            return view('login',[
                'erreur' => 'Identifiant invalide'
            ]);
        }
    }

    public function fiche($id){
        $article = Contenu::find($id);
        return view('ficheback',[
            'rows' => $article
        ]);
    }

    public function remove($id){
        $article = Contenu::find($id);
        $article->delete();
        return $this->liste();
        
    }

    public function edit($id){
        $article = Contenu::find($id);
        return view('modif',[
            'article' => $article
        ]);
        
    }

    public function modif(Request $request){
        $input=$request->input();
        $titre=$input['titre'];
        $lieu=$input['lieu'];
        $date=$input['date'];
        $Contenu=$input['contenue'];
        $photo=$input['photo'];
        $id=$input['id'];


        $info=Contenu::find($id);

        $info->titre=$titre;
        $info->lieu=$lieu;
        $info->body=$Contenu;
        $info->date_publication=$date;
        if(strcmp($photo,'')!=0){
            $info->photo=$photo;
        }

        $info->save();

        return $this->liste();
    }

    public function liste(){
        $info=Contenu::all();
        return view('liste',[
            'listeArticle' => $info
        ]);
    }


    public function ajout(){
        return view('ajout');
    }

    public function create(Request $request){
        $input=$request->input();
        $titre=$input['titre'];
        $lieu=$input['lieu'];
        $date=$input['date'];
        $Contenu=$input['contenue'];
        $photo=$input['photo'];

        Contenu::create([
            'titre' => $titre,
            'body' => $Contenu,
            'photo' => $photo,
            'lieu' => $lieu,
            'date_publication' => $date,
            'id_administrateur' => 1,
        ]);
        return $this->liste();
    }
}
