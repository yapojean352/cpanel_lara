@extends('layouts.app')
@section('content')
<h1>Details du velo  {{$id->marque}}</h1>
<table id="detail">

  <tr>
    <td>numero de serie<br>
    {{$id->num_serie}}</td>
    <td>Modele<br>
    {{$id->modele}}</td>
    <td>Couleur<br>
    {{$id->couleur}}</td>
  </tr>
  <tr>
    <td>Taille<br>
    {{$id->grandeur}}
   </td>
    <td>Accessoire particuliere<br>
    {{$id->accessoire}}  </td>
    <td>Details sur le vélo<br>
    {{$id->detail}} 
</td>
  </tr>
  <tr>
    <td>Vélo de <br>
    @foreach($typeVelos as $typeVelo) 
   {{ $typeVelo->type }}    
     @endforeach 
</td>
    <td> @foreach($status as $statu) 
   {{ $statu->statut }}    
     @endforeach 
      Le : {{$id->date =='' ? 'Date Non DEfinie' : $id->date  }}; A l'adresse :{{$id->address_address}}</td>
     
    <td>.</td>
  </tr>
  <tr>
    <td>.</td>
    <td>.</td>
    <td>.</td>
  </tr>
  
</table>
@endsection