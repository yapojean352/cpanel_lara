<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class photoController extends Controller
{
    //
    public function uploadForm()
    {
        return view('upload_form');
    }
    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('image');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
//dd($check);
                if ($check) {
                    $items = Item::create($request->all());
                    foreach ($request->image as $photo) {
                        $filename = $photo->store('image');
                        ItemDetail::create([
                            'item_id' => $items->id,
                            'filename' => $filename,
                        ]);
                    }
                    echo "Upload Successfully";
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
        }
//===
    }
//function supprimer une photo
    public function destroy(int $id)
    {
//suppression des photos
        $photo = Photo::all()->where('id', $id);
        foreach ($photo as $cle) {
            //dd($cle->id);
            if ($cle->imageUrl) {
                //suppression des images dans le dossier app/public/
                unlink(storage_path('app/public/'.$cle->imageUrl));
            }
            $cle->delete();
        }
        return redirect()->back();
    }

///
}?>
}
