@extends('layouts.app')
@section('content')
<ul>
@foreach($velos as $velo)
<li>{{$velo->marque}}/{{$velo->image}} </li>
remarque a supprimer
 <img src="{{ asset('storage/')}}/{{$velo->image}} " width="100" height="100"><br>
 <a href="{{route('velos.edit',['id'=>$velo->id])}}">Modifier</a><br>
 <a href="{{route('velo.supprimer',['id'=>$velo->id])}}">Supprimer</a>

 
@endforeach
</ul>
@endsection