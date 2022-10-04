@extends('layouts.app')
@section('content')

<div class="contentVelos">
    <section id="liste_velos" class="liste_velos">
        @if (count($velos) > 0)
        @foreach($velos as $velo)
        <div class="velo" data-quantite="">
            <div class="detailBt" id="detailBt">
                <div> <span>{{ __('velo.marque') }} </span>
                    <p>{{$velo->marque}} </p><br>
                </div>
                <div> <span>{{ __('velo.modele') }} </span>
                    <p>{{$velo->modele}} </p>
                </div>

            </div>
            <div class="img">
                @if($velo->photos->first())
                <p><img src="{{'https://bsoccasionsplus.ca/lara/storage/app/public/'.$velo->photos->first()->imageUrl}}" width="100" height="100"></p>
                @else
                <p><img src=" {{ asset('image/velodefaut.jpg') }} " width="100" height="100"></p>
                @endif
            </div>
        </div>

        @endforeach
        @else

        <p> cette recherche n'est pas trouvée </p>
        @endif
    </section>
    <div id="imageVue">
        <ul class="listImage">
        </ul>
        <div class="imageDefault"></div>
        <div class="imageCharger">
        </div>
    </div>
    <div class="paginate d-flex justify-content-center">
        <span>{!! $velos->links()!!}
    </div>
</div>
<div id="maps-canvas">
    velos perdus<img src="{{ asset('image/pin1.png') }} " width="40" height="40">
    velos Retrouvés<img src="{{ asset('image/pin.png') }}" width="40" height="40">
</div>
<style>
.w-5 {
    display: none;
}
</style>
<script>
var maps = new google.maps.Map(document.getElementById('maps-canvas'), {
    center: {
        lat: 45.50,
        lng: -73.5
    },
    zoom: 10,
    minZoom: 6,
    maxZoom: 15,
});
//recupere les donnes de la vue
//changer l icone map
//var image = new google.maps.MarkerImage("{{ asset('image/pin.png') }}", null, null, null, new google.maps.Size(40,52));
var places = @json($velos);
var image;
console.log(places.data);
//extraction des latitude et longitude {{ asset('image/logo-velo.png') }}
places.data.forEach(function(file, key) {
    if (file.status_id == 1) {
        image = new google.maps.MarkerImage("{{ asset('image/pin.png') }}", null, null, null, new google.maps
            .Size(40, 52));
    } else {
        image = new google.maps.MarkerImage("{{ asset('image/pin1.png') }}", null, null, null, new google.maps
            .Size(40, 52));
    }
    var markers = new google.maps.Marker({
        // position:{lat:t, lng: -73.57256},
        position: new google.maps.LatLng(file.address_latitude, file.address_longitude),
        icon: image,
        map: maps,
        title: file.marque

    });

});
</script>

@endsection