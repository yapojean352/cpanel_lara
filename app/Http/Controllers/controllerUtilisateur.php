<?php

namespace App\Http\Controllers;

use App\Models\velo;
use App\Models\type_velo;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\typeuser ;
class controllerUtilisateur extends Controller
{
    //
    public function create(){
        $typeUsers = typeuser::all();
        return view('velos.infoPersonnel',compact('typeUsers'));
    }
    public function store(){

        
        //        //helper de validation
               $data =request()->validate([
                   'nom'=>['required','string'],
                   'prenoms'=>['required','string'],
                   'dateNaiss'=>['required','string'],
                   'addresse'=>['required','string'],
                    'categorie'=>['required','string'],
                    'rue'=>['required','string'],
                    'appart'=>['string'],
                  'province'=>['required','string'],
                  'ville'=>['required','string'],
                    'pays'=>['required','string'],
                   'cp'=>['required','string'],
                    'Email'=>['required','email'],
                 'Telephone'=>['required','string'],
                 'poste'=>['string'],
                 'test'=>['required'],
                 'mdp'=>['required'],
                 'mdp-confirm'=>['required','same:mdp']
               ],[
                'nom.required' => 'champ obligatoire.',
                'mdp.required' => 'champ obligatoire.',
                'mdp-confirm.required' => 'champ obligatoire.',
                'mdp-confirm.same' => 'veuiller repeter le mot de passe exacte',
            ]);
          //  dd($data['nom']); //$data['categorie']
            // if(request()->post('categorie')  == "4"){
            //   $data['nom']='null';
            //   $data['prenoms']='null';
            //  $data['dateNaiss'] ='0000-00-00';
            //   $data['addresse']='null'; 
            //   $data['rue']='null';
            //  $data['appart']='null';
            //   $data['province']='null';
            //   $data['ville']='null';
            //   $data['pays']='null';
            //   $data['cp']='null';
            //   $data['Telephone']='null';

            // }
              if(request()->post('test')=="confirm" ){
        // //    //    var_dump(utilisateur::all()->where('id','1'));  
        // //        //enregistrer users_id','1'l image dans le dossier storage dans pubic return le chemin
        // //     $imgPath= request('image')->store('uploads','public');
        // //     //traiter l utilisateur connecter
            utilisateur::updateOrCreate([
                'nom'=>$data['nom'],
                'prenoms'=>$data['prenoms'],
               'dateNaiss'=>$data['dateNaiss'],
                'adrresse'=>$data['addresse'], 
                'rue'=>$data['rue'],
               'numAppart'=>$data['appart'],
                'province'=>$data['province'],
                'ville'=>$data['ville'],
               'typeusers_id'=>$data['categorie'],
                'pays'=>$data['pays'],
              'codePostal'=>$data['cp'],
                  'telephone'=>$data['Telephone'],
               'email'=>$data['Email'],
                'password'=>$data['mdp'],
               'poste'=>$data['poste']
        // insert into `utilisateurs` (`nom`, `prenoms`, `dateNaiss`, `categorie`, `addresse`, `rue`, `appart`, `province`, `ville`, `pays`, `cp`, `Email`, `Telepone`, `poste`, `mdp`, `mdp-confirm`, `form`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, suivant, 2020-10-27 04:30:48, 2020-10-27 04:30:48))
    
           ]);
           $last_id =DB::table('utilisateurs')->latest('id')->first()->id;
           return redirect()->route('velos.create',['id' => $last_id]);
        }
           //recuperer le dernoere id de lutilisateur
        

       
//$user = utilisateur::create($request->all());
//var_dump($user);
//return redirect()->route('velos.create',['id' => $last_id]);
              
           }
}
