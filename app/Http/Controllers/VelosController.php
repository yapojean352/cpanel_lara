<?php

namespace App\Http\Controllers;

use App\Models\Velo;
use App\Models\Photo;
use App\Models\statu;
use App\Models\type_velo;
use App\Models\utilisateur;
use App\Rules\imageValidate;
use Illuminate\Http\Request;
use App\Rules\imageValidateUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VelosController extends Controller
{
    public $as;
    //vue historique
    public function historique()
    {
        $histVelos = Velo::paginate(10);

        return view('velos.historique', compact('histVelos'));
    }
    public function detail(Velo $id)
    {
        $typeVelos = type_velo::all()->where('id', $id->typeVelos_id);
        $status = statu::all()->where('id', $id->status_id);
        // dd($status);
        return view('velos.details', compact('id', 'typeVelos', 'status'));
    }
    
//recupere les liste de tous les velos dans la bd
    public function getListeVelos()
    {
// donees a envoyes a la vue
        // $velos =['dmx','fiat'];
        if (request()->input('as') || request()->input('catego')) {
            request()->validate([
                'as' => 'min:0',
            ]);
            $this->as = request()->input('as');
            $cat = request()->input('catego');

        } else {
            $this->as = "";
            $cat = "";
        }
// $velos =  DB::table('velos')
        // ->join('photos','photos.velo_id','velos.id')
        // ->select('velos.id','velos.marque','photos.imageUrl')->distinct('photos.velo_id')
        // ->get();
        // $photos =  DB::table('photos')->take(2)
        // ->join('velos','photos.velos_id','velos.id')
        // ->select('photos.imageUrl','velos.id','velos.marque')->distinct('photos.velos_id')//
        // ->get();
        // //
        //dd($velos);

        $velos = Velo::Where('status_id', '!=', 0)
            ->where(function ($q) {
                $q->orwhere('modele', 'like', "%$this->as%");
                $q->orwhere('marque', 'like', "%$this->as%");
                $q->orwhere('date', 'like', "%$this->as%");
                $q->orwhere('address_address', 'like', "%$this->as%");
                // ->orWhere('type', 'public');
            })
            ->paginate(10);

        return view('velos.listesVelos', compact('velos'));
    }
    public function create()
    {
        $typeVelos = type_velo::all();
        $status = statu::all();

        return view('velos.creerVelo', compact('typeVelos', 'status'));
    }
    public function store(request $request)
    {
        $us = Auth::user()->id;
        $uservelos = Velo::where("users_id", $us)->paginate(100);
//helper de validation

        $data = request()->validate([
            'marque' => ['required', 'string'],
            'modele' => ['required', 'string'],
            'numserie' => ['required', 'string'],
            'burinage' => ['required', 'string'],
            'couleur' => ['required', 'string'],
            'grandeur' => ['required', 'string'],
            'adrVol' => ['min:2'],
            'dateVol' => ['min:2'],
            'address_address' => ['min:2'],
            'address_latitude' => ['min:2'],
            'address_longitude' => ['min:2'],
            'typeVelo' => ['required', 'string'],
            'statut' => ['required', 'string'],
            'accessoire' => ['required', 'string'],
            'image' => [new imageValidate($request->image, $uservelos)],
            'details' => ['required:string'],
//'image' => 'file|image|max:5000'
            //  'image' => ['required'],
        ]);
        // dd( new imageValidate());

        //  if ($request->image) {
        //  if (count($request->image) > 4) {

        // $data = request()->validate([
        //     //'image' => 'file|image|max:5000'
        //     'image' => ['required',new imageValidate($request->image,$uservelos)],
        // ]);
        //    }
        //   }

        $id = Auth::id();
//enregistrer users_id','1'l image dans le dossier storage dans pubic return le chemin
        //   $imgPath= request('image')->store('uploads','public');
        // dd(request('image'));
        //traiter l utilisateur connecter

//recuperer le dernier id du velos
        // $last_id =DB::table('velos')->latest('id')->first()->id;

//if($request->hasFile('image')){
        //$allowedfileExtension=['pdf','jpg','png','docx'];
        //$files = $request->file('image');
        //  creation ds autres champs

        $v = Velo::create([
            'marque' => $data['marque'],
            'modele' => $data['modele'],
            'num_serie' => $data['numserie'],
            'numero_burinage' => $data['burinage'],
            'couleur' => $data['couleur'],
            'grandeur' => $data['grandeur'],
            'accessoire' => $data['accessoire'],
            'detail' => $data['details'],
            'image' => '$imgPath',
            'users_id' => $id,
            'status_id' => $data['statut'],
            'addresse_vol' => $data['adrVol'],
            'date' => $data['dateVol'],
            'address_address' => $data['address_address'],
            'address_longitude' => $data['address_longitude'],
            'address_latitude' => $data['address_latitude'],
            'typeVelos_id' => $data['typeVelo'],

        ]);

//   foreach($files as $file){
        // $filename = $file->getClientOriginalName();
        // $extension = $file->getClientOriginalExtension();
        // $check=in_array($extension,$allowedfileExtension);
        //dd($check);
        //if($check)
        //{
        //dd($request->files);
        //$items= Item::create($request->all());
        //recupeerer les photos de cet utlisateur
        // $us = Auth::user()->id;
        // $uservelos = Velo::where("users_id", $us)->paginate(100);
        // foreach ($uservelos as $ts) {
        //  dd(count(($ts)->photos));
        if ($request->image) {
            foreach ($request->image as $photo) {
                $filename = $photo->store('uploads', 'public');
                //dd($photo);
                Photo::create([
                    'velo_id' => $v->id,
                    'imageUrl' => $filename,
                ]);
            }
        };
        // if (count($request->image) > count(($ts)->photos)) {
        //     //affecter une valeur au span retourne une erreur

        // };
        //}

//}
        return redirect()->route('listeVelos');

    }
//reurn la vue formulaire d edition
    public function edit(velo $id)
    {
        $typeVelos = type_velo::all();
//dd($id->photos);
        $status = statu::all();
        return view("velos.editVelos", compact('id', 'typeVelos', 'status'));
    }
/**
 * function de mise a jour
 */
    public function update(velo $id, request $request)
    {
        
        $us = Auth::user()->id;
        $uservelo = Velo::where("id", $id->id)->paginate(100);
      
    //   foreach ( $uservelo as $suv) {
    //     dd(count($suv->photos));
    //   }
       
        $data = request()->validate([
            'marque' => ['required', 'string'],
            'modele' => ['required', 'string'],
            'numserie' => ['required', 'string'],
            'burinage' => ['required', 'string'],
            'couleur' => ['required', 'string'],
            'grandeur' => ['required', 'string'],
            'adrVol' => ['required', 'string'],
            'typeVelo' => ['required', 'string'],
            'statut' => ['required', 'string'],
            'accessoire' => ['required', 'string'],
            'details' => ['required', 'string'],
            'image' => [new imageValidateUpdate($request->image,$uservelo)],
            'id' => ['required', 'string'],
//'image'=>['image']
        ]);
//recupere le chemin du path
        //$imgPath= request('image')->store('uploads','public');
        $id->update([
            'marque' => $data['marque'],
            'modele' => $data['modele'],
            'num_serie' => $data['numserie'],
            'numero_burinage' => $data['burinage'],
            'couleur' => $data['couleur'],
            'grandeur' => $data['grandeur'],
            'accessoire' => $data['accessoire'],
            'detail' => $data['details'],
            'image' => '$imgPath',
            'status_id' => $data['statut'],
            'addresse_vol' => $data['adrVol'],
            'typeVelos_id' => $data['typeVelo'],

        ]);

//modifiecation des photos du velo
        //TODO afficher les photos en donnant la possibilte de les supprimer
        //recuperer l ancien image
        if ($request->image) {
            foreach ($request->image as $photo) {
                $filename = $photo->store('uploads', 'public');
                //dd($filename);
                Photo::create([
                    'velo_id' => $id->id,
                    'imageUrl' => $filename,
                ]);
            }
        }

//rechargement
        return redirect()->route('listeVelos');
    }
/**
 * repere les velos de  lutilisateur connecte.
 *
 * @return \Illuminate\View\View
 */
    public function show()
    {
// donnees a envoyes a la vue
        $user = Auth::user()->id;
        $velos = velo::all()->where("users_id", $user);
        return view('velos.monvelo', compact('velos', 'user'));
    }
    /**
 * repere un de  lutilisateur connecte.
 *
 * @return \Illuminate\View\View
 */
public function showOneVelo(velo $id)
{
    
// donnees a envoyes a la vue
    $user = Auth::user()->id;
    $onevelo = velo::all()->where("id",$id->id);
    // dd($onevelo);
    return view('velos.veloShare', compact('onevelo', 'user'));
}
/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
    public function destroy(int $id)
    {
// delete le velos
        $velo = Velo::find($id);
        $velo->delete();
//suppression des photos
        $photo = Photo::all()->where('velo_id', $id);
        foreach ($photo as $cle) {
            if ($cle->imageUrl) {
                //suppression des images dans le dossier
                unlink(storage_path('app/public/' . $cle->imageUrl));
            }
            $cle->delete();
        }
        return redirect()->back();
    }

}
