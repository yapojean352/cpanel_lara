@extends('layouts.app')
@section('content')

<div class="contentVelos">
    <p>Mon vélo  </p>
    @if (count($onevelo) > 0)
    @foreach($onevelo as $velo)
    <div class="velo" data-quantite="">
        <div class="detailBt" id="detailBt">
            <p>Mes images de mon vélo  <p></p></p>

        </div>
        <div class="img">
            @foreach($velo->photos as $photo)
            <p><img src="{{ asset('storage/')}}/{{$photo->imageUrl}} " width="200" height="200"></p>
            <a href="{{ asset('storage/')}}/{{$photo->imageUrl}}">partage Facebook</a>
            @endforeach
        </div>

    </div>
    @endforeach
    @else
    <p> {{ __('velo.pas-velo') }}</p>
    @endif
</div>
@endsection