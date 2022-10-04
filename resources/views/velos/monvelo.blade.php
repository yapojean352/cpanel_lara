@extends('layouts.app')
@section('content')

<div class="contentVelos">

    @if (count($velos) > 0)
    {{-- expr --}}

    <section id="liste_velos" class="liste_velos">

        @foreach($velos as $velo)
        <div class="velo" data-quantite="">
            <div class="detailBt" id="detailBt">
                <p>{{$velo->marque}} </p>
                <p>{{$velo->modele}} </p>
                <p>{{$velo->num_serie}} </p>
                <p>{{$velo->numero_burinage}} </p>
            </div>
            <div class="options">
                <button><a href="{{route('velos.edit',['id'=>$velo->id])}}"><i class="far fa-edit"
                            style="font-size: 1em; color:blue ;"></i></a></button>
                <button><a href="{{route('velo.supprimer',['id'=>$velo->id])}}"><i class="fas fa-trash-alt"
                            style="font-size: 1em; color:red ;"></i></a></button>
            </div>
            <div class="img">
                @foreach($velo->photos as $photo)
            
                <div><img src="{{'https://bsoccasionsplus.ca/lara/storage/app/public/'.$photo->imageUrl}} " width="100" height="100">
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href=https://bsoccasionsplus.ca/lara/storage/app/public/{{$photo->imageUrl}}&layout=button&size=small&width=81&height=20&locale={{LaravelLocalization::getCurrentLocaleRegional()}}&appId"
                             width="81" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
                            allowfullscreen="true"  allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                @endforeach
            </div>

        </div>
        @endforeach
        @else
        <p> {{ __('velo.pas-velo') }}</p>
        @endif

    </section>
</div>
@endsection