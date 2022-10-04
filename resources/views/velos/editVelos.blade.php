@extends('layouts.app')
@section('monAcceuil')
<div class="contentCreer">
    <div class="card-header titreLogE">
        <h3 id="titre"> {{ __('velo.titre') }}</h3>
    </div>
    <form method="post" action="{{ route('velos.update',['id'=>$id])}}" class='editForm' enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <input type="hidden" name="id" value="<?php echo (isset( $_GET["id"])) ? $_GET["id"] : '12' ; ?>" />
        </div>
        <div>
            <label>{{ __('velo.marque') }}:</label>
            <select class="marque" name="marque" id="marque">
                <option value="{{old('marque') ?? $id->marque}}" {{ $id->marque ? 'selected' : '' }}>
                    {{$id->marque ? $id->marque: __('velo.marque-select')  }}</option>
                <option value="AVP"> AVP </option>
                <option value="Altima "> Altima </option>
                <option value=" Aventon"> Aventon </option>
                <option value="BMC "> BMC </option>
                <option value="BMX "> BMX </option>
                <option value="Beekay "> Beekay </option>
                <option value="Bianchi "> Bianchi </option>
                <option value="Bombtrack "> Bombtrack </option>
                <option value="Bonelli "> Bonelli </option>
                <option value="Cannondale "> Cannondale </option>
                <option value="Canyon "> Canyon </option>
                <option value="CINELLI"> cinelli </option>
                <option value="Concorde "> Concorde </option>
                <option value="Courselle "> Courselle </option>
                <option value="Cube "> Cube </option>
                <option value="Cyclo "> Cyclo </option>
                <option value="Decathlon "> Decathlon </option>
                <option value="Devinci "> Devinci </option>
                <option value="Diadora "> Diadora </option>
                <option value="Eclipse "> Eclipse </option>
                <option value="EXS "> EXS </option>
            </select>
            @error('marque')
            <span class="erroFile">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label>{{ __('velo.modele') }}:</label>
            <select class="modele  " name="modele">
                <option value="{{old('modele') ?? $id->modele}}" {{ $id->modele ? 'selected' : '' }}>
                    {{$id->modele ? $id->modele: __('velo.modele-select')  }}</option>
            </select>
            @error('modele')
            <span class="erroFile">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label>{{ __('velo.serie') }}:</label><input type="text" name="numserie"
                value="{{old('numserie') ?? $id->num_serie}}" />
            @error('numserie')
            <span class="erroFile">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label>{{ __('velo.burinage') }}:</label><input type="text" name="burinage"
                value="{{old('burinage') ?? $id->numero_burinage}} " />
            @error('burinage')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div>
            <label class="erroFile">{{ __('velo.couleur') }}:</label>
            <select class="couleur" name="couleur" id="couleur" required autocomplete="couleur" autofocus>
                <option value="{{old('couleur') ?? $id->couleur}}" {{ $id->couleur ? 'selected' : '' }}>
                    {{$id->couleur ? $id->couleur: __('velo.couleur-select')  }}</option>
                <option value="Noir"> Noir </option>
                <option value="Blanche "> Blanche </option>
                <option value="Bleue "> Bleue </option>
                <option value="Gris "> Gris </option>
            </select>
            @error('couleur')
            <span class="erroFile">{{$message}}</span>
            @enderror

        </div>
        <div>
            <label>{{ __('velo.grandeur') }}:</label><input type="text" name="grandeur"
                value="{{old('grandeur') ?? $id->grandeur}} " />
            @error('grandeur')
            <span class="erroFile">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label>{{ __('velo.Type-velos') }}:</label>
            <select name="typeVelo" id="cars">
                <option value="">{{ __('velo.choisir') }}</option>
                @foreach($typeVelos as $typeVelo)
                <option value="{{$typeVelo->id}}" {{$typeVelo->id == $id->typeVelos_id ? 'selected' : '' }}>
                    {{$typeVelo->type}}</option>
                @endforeach
            </select>
            @error('typeVelo')
            <span class="erroFile">{{$message}}</span>
            @enderror

        </div>
        <div>
            <label>{{ __('velo.accessoires') }}:</label><input type="text" name="accessoire"
                value="{{old('accessoire') ?? $id->accessoire}} " />
            @error('accessoire')
            <span class="erroFile">{{$message}}</span>
            @enderror
        </div>
        <div>
            <div>
                <label>{{ __('velo.image') }}:</label><input type="File" id="image" name="image[]"
                    value="{{ old('image') }} " accept="image/*" multiple />
                @error('image')
                <span class="erroFile">{{$message}}</span>
                @enderror
                <input type="File" id="images" name="images[]" value="{{ old('image') }} " accept="image/*" multiple />
                <div id="imageVue">
                    <ul class="listImage">
                    </ul>
                    <div class="imageDefault"></div>
                    <div class="imageCharger">
                    </div>
                </div>

                <p>{{ __('velo.sizeMax') }}</p>
            </div>
            </p>
            <p><u>{{ __('velo.question') }}</u></p>


            <input type="radio" id="oui" name="choix" value="oui" {{$id->status_id != 0? 'checked' : '' }}>
            <label for="oui">{{ __('velo.oui') }}</label>

            @if($id->status_id == 0 )
            <input type="radio" id="non" name="choix" value="non" {{ $id->status_id == 0 ? 'checked' : '' }}>
            <label for="non">{{ __('velo.non') }}</label><br>
            @endif
            <section id="close">
                <div>
                    <label class='masquer'>{{ __('velo.statut') }}:</label>
                    <select name="statut">
                        <option value=" ">{{ __('velo.statut-select') }} </option>
                        @foreach($status as $statu)
                        <option value="{{$statu->id}}" {{ $statu->id == $id->status_id ? 'selected' : '' }}>
                            {{$statu->statut}}</option>
                        @endforeach
                    </select>
                    @error('statut')
                    <span class="erroFile">{{$message}}</span>
                    @enderror

                </div>
                <div>
                    <label>lieu:</label><input type="text" name="adrVol"
                        value="{{old('adrVol')==$id->addresse_vol ?old('adrVol'):$id->addresse_vol }}" />
                    @error('adrVol')
                    <span class="erroFile">{{$message}}</span>
                    @enderror

                </div>
                <div> <label>{{ __('velo.geo') }}:</label><input type="text" id="address-input" name="address_address"
                        value="{{ $id->address_address }}">
                    @error('address_address')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label>{{ __('velo.date') }} :{{$id->date}}</label><input type="Date" name="dateVol"
                        value="{{$id->date}}" />
                    @error('dateVol')
                    <span class="erroFile">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label>{{ __('velo.details') }}:</label><br><textarea name="details" rows="5"
                        cols="50"> {{old('details') ?? $id->detail}}</textarea>
                    @error('details')
                    <span class="erroFile">{{$message}}</span>
                    @enderror

                </div>
                 
        <div class="img">
            {{ __('velo.photos') }}
            @foreach($id->photos as $photo)
            <p><a href="{{route('photo.supprimer',['id'=>$photo->id])}}"><i class="fas fa-trash-alt"
                        style="font-size: 1em; color:red ;"></i></a><img
                    src="{{'https://bsoccasionsplus.ca/lara/storage/app/public/'.$photo->imageUrl}} " width="100"
                    height="100"></p>
            @endforeach
        </div>
   
                <div id="map-canvas"></div>
                <input type="hidden" name="address_latitude" id="address-latitude"
                    value="{{ old('address_latitude') }}" />
                <input type="hidden" name="address_longitude" id="address-longitude"
                    value="{{ old('address_longitude') }}" />

            </section>


            <div>
                <input type="submit" value="{{ __('velo.modifier') }} " name="form" class="btnInput" />
            </div>

    </form>
   

</div>

</section>
@endsection