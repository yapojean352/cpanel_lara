@extends('layouts.app')
@section('content')
<div class="contentCreer">
    <div class="card loginBx">
        <div class="card-header titreLog">
            @guest

            <h3>{{ __('velo.titreCreer') }} </h3>
            @else
            <h3>{{ __('velo.titreCreer') }} </h3>
            @endguest
        </div>
        <div class="card-body ">
            <form method="POST" class='editForm alignInput' action="{{ route('velos.store')}}"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $_GET["id"] : ''; ?>" />
                </div>
                <div>
                    <label>{{ __('velo.marque') }}:</label>
                    <select class="marque" name="marque" id="marque" required autocomplete="marque" autofocus>
                        <option value="">
                            {{ old('marque') ? old('marque'): __('velo.marque-select')  }}</option>
                        <option value="AVP"> AVP </option>
                        <option value="CINELLI"> cinelli </option>
                    </select>
                    @error('marque')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label class="cache">{{ __('velo.modele') }}:</label>
                    <select class="modele  " name="modele" required autocomplete="modele" autofocus>
                        <option value="{{ old('modele')}}" {{ old('modele') ?? 'selected'  }}>
                            {{ old('modele') ? old('modele'):__('velo.model-select') }}</option>
                    </select>
                    @error('modele')
                    <span class="erroFile">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label>{{ __('velo.serie') }}:</label><input type="text" name="numserie"
                        value="{{ old('numserie') }}" required autocomplete="numserie" autofocus />
                    @error('numserie')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label>{{ __('velo.burinage') }}:</label><input type="text" name="burinage"
                        value=" {{ old('burinage') }}" required autocomplete="burinage" autofocus />
                    @error('burinage')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label>{{ __('velo.couleur') }}:</label>
                    <select class="couleur" name="couleur" id="couleur" required autocomplete="couleur" autofocus>
                        <option value="{{ old('couleur') }}" {{ old('couleur') ?? 'selected'  }}>
                            {{ old('couleur') ? old('couleur'): __('velo.couleur-select') }}</option>
                        <option value="Noir"> Noir </option>
                        <option value="Blanche "> Blanche </option>
                        <option value="Bleue "> Bleue </option>
                        <option value="Gris "> Gris </option>
                    </select>
                    @error('couleur')
                    <span>{{$message}}</span>
                    @enderror

                </div>
                <div>
                    <label>{{ __('velo.grandeur') }}:</label><input type="text" name="grandeur"
                        value="{{ old('grandeur') }}  " required autocomplete="grandeur" autofocus />
                    @error('grandeur')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label>{{ __('velo.Type-velos') }}:</label>
                    <select class="typeVelos" name="typeVelo" id="cars" required autocomplete="typeVelo" autofocus>
                        <option value="">{{ __('velo.typeVelo-select') }}</option>
                        @foreach($typeVelos as $typeVelo)
                        <option value="{{$typeVelo->id}}" {{ old('typeVelo') == $typeVelo->id ? 'selected' : '' }}>
                            {{$typeVelo->type}}</option>
                        @endforeach
                    </select>
                    @error('typeVelo')
                    <span>{{$message}}</span>
                    @enderror

                </div>
                <div>
                    <label>{{ __('velo.accessoires') }}:</label>
                    <br><textarea name="accessoire" rows="5" required autocomplete="accessoire"
                        autofocus> {{ old('accessoire') }} </textarea>
                    @error('accessoire')
                    <span>{{$message}}</span>
                    @enderror
                </div>


                <div>
                    <label>{{ __('velo.image') }}:</label><input type="File" id="image" name="image[]"
                        value="{{ old('image') }} " accept="image/*" multiple required autocomplete="image" autofocus />
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                    <input type="File" id="images" name="images[]" value="{{ old('image') }} " accept="image/*"
                        multiple />
                    <div id="imageVue">
                        <ul class="listImage">
                        </ul>
                        <div class="imageDefault"></div>
                        <div class="imageCharger">
                        </div>
                    </div>

                    <p>{{ __('velo.sizeMax') }}</p>
                </div>
                <p><u>{{ __('velo.question') }}</u></p>
                <div class='ouiNon'>
                    <input class="" type="radio" id="oui" name="choix" value="oui"
                        {{ old('choix') == 'oui' ? 'checked' : 'checked' }}>
                    <label class="" for="oui">{{ __('velo.oui') }}</label>
                    <input class="" type="radio" id="non" name="choix" value="non"
                        {{ old('choix') == 'non' ? 'checked' : '' }}>
                    <label class="" for="non">{{ __('velo.non') }}</label><br>
                </div>
                <section id="close">
                    <div class="createBx">
                        <div>
                            <label class='masquer'>{{ __('velo.statut') }}:</label>
                            <select class="statu" name="statut">
                                <option value=" ">{{ __('velo.statut-select') }}</option>
                                <option value="2" {{ old('statut') == 2 ? 'selected' : '' }}>
                                    {{ __('velo.perdu') }}
                                </option>
                                <option value="1" {{ old('statut') == 2 ? 'selected' : '' }}>
                                    {{ __('velo.retrouvé') }}
                                </option>
                            </select>
                            @error('statut')
                            <span>{{$message}}</span>
                            @enderror

                        </div>
                        <div>
                            <label>{{ __('velo.lieu') }}:</label><input type="text" name="adrVol"
                                value=" {{ old('adrVol') }} " />

                            @error('adrVol')
                            <span>{{$message}}</span>
                            @enderror

                        </div>
                        <div> <label>{{ __('velo.geo') }}:</label><input type="text" id="address-input"
                                name="address_address" value="{{ old('address_address') }}">
                            @error('address_address')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label>{{ __('velo.date') }} :</label><input type="date" name="dateVol"
                                value="{{ old('dateVol') }}" />
                        </div>
                        <div>
                            <label>{{ __('velo.details') }}:</label><br><textarea name="details"
                                rows="5"> {{ old('details') }} </textarea>
                            @error('details')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div id="map-canvas"></div>
                        <input type="hidden" name="address_latitude" id="address-latitude"
                            value="{{ old('address_latitude') }}" />
                        <input type="hidden" name="address_longitude" id="address-longitude"
                            value="{{ old('address_longitude') }}" />
                    </div>
                </section>
                <div>
                    <input id="creerInput" type="submit" value="{{ __('velo.enregister') }}" name="form"
                        class="btnInput" />
                </div>
            </form>
        </div>
        <div id="can-map"></div>
    </div>
</div>
@endsection