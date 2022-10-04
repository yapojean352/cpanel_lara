@extends('layouts.app')
@section('info')
<h1>Information Personnelle étape 1/1</h1>

<form method="POST" action="">
 {{csrf_field()}}
 <div> 
       <label>categorie utilisateur:</label>
       <select name="categorie" id="idCategory" >
                <option value="-1" >selectionner une categorie</option>
                @foreach($typeUsers as $typeUser) 
                <option value="{{$typeUser->id}}"{{ old('categorie') == $typeUser->id ? 'selected' : '' }} >{{$typeUser->typeUser}}</option>
                @endforeach
        </select>
       @error('categorie')
       <span>{{$message}}</span>
       @enderror
   </div>
 <div id="masquer">
   <div>
       <label>nom:</label><input type="text"  name="nom" value="{{ old('nom') }}" />
       @error('nom')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>prenoms:</label><input type="text"  name="prenoms" value="{{ old('prenoms') }}" />
       @error('prenoms')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>Date de naissance:</label><input type="date"  name="dateNaiss" value="{{ old('dateNaiss') }}" />
       @error('dateNaiss')
       <span>{{$message}}</span>
       @enderror
   </div>
   
   <div>
       <label>addresse:</label><input type="text"  name="addresse"  value="{{ old('addresse') }} "/>
       @error('addresse')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>rue:</label><input type="text"  name="rue"  value="{{ old('rue') }} "/>
       @error('rue')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>appartement:</label><input type="text"  name="appart"  placeholder="s'il ya lieu" value="{{ old('appart') }} "/>
       @error('appart')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>province:</label><input type="text"  name="province"  value=" {{ old('province') }}"/>
       @error('province')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>ville:</label><input type="text"  name="ville"  value=" {{ old('ville') }}"/>
       @error('ville')
       <span>{{$message}}</span>
       @enderror
     
   </div>
   <div>
       <label>pays:</label>
       <select name="pays"  class="pays">
        <option value="{{ old('pays') }}">Choisissez votre pays</option>
        <option value="canada">Canada</option>
        <option value="france">Usa</option>
    </select>
       @error('pays')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>code postal:</label><input type="text"  name="cp"  value="{{ old('cp') }} "/>  
       @error('cp')
       <span>{{$message}}</span>
       @enderror
   </div> 
   <div>
       <label>Telephone:</label><input type="text" name="Telephone" value="{{ old('Telephone') }}"/>
       @error('Telepone')
       <span>{{$message}}</span>
       @enderror
       <label>poste :</label><input type="text" size="10" name="poste" placeholder="s'ilya lieu" value="{{ old('poste') }}"/>
       @error('poste')
       <span>{{$message}}</span>
       @enderror
         
   </div>
   </div>
   <div>
       <label>Email:</label><input type="text" name="Email" value="{{ old('Email') }}"/>
       @error('Email')
       <span>{{$message}}</span>
       @enderror
   </div>
  
   <div>
       <label>mot de passe :</label><input type="password" name="mdp" value="{{ old('mdp') }}"/>
       @error('mdp')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
       <label>confirmation mot de passe :</label><input type="password" name="mdp-confirm" value="{{ old('mdp-confirm') }}"/>
       @error('mdp-confirm')
       <span>{{$message}}</span>
       @enderror
   </div>
   <div>
   @error('test')
       <span>{{$message}}</span>
   @enderror
    <input type="checkbox" id="controleInfos" name="test" value="confirm">
   
    <label for="controleInfos">je certifie que les informations renseignées sont exactes</label>
  </div>

   <div>
       <input type="submit" value="suivant" name="form" />
   </div>
  

</form> 
@endsection
       

   