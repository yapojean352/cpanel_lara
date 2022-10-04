@extends('layouts.app')
@section('content')
<div class="regis contentCreer">
    <div class="card-header titreLogE">
        <h3> {{ __('Enr.enregistrer-titre') }}</h3>
    </div>


    <div class='regisInfo'>{{ __('Enr.enregistrer-info') }}</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>{{ __('Enr.enregistrer-CatUser') }}:</label>
            <select name="categorie" id="idCategory" required autocomplete="categorie" autofocus>
                <option value="-1">{{ __('Enr.enregistrer-selectCat') }}</option>
                <option value="1">{{ __('Enr.category-user.particulier') }}</option>
                <option value="4">{{ __('Enr.category-user.magasin') }}</option>
                <option value="2">{{ __('Enr.category-user.police') }}</option>
                <option value="3">{{ __('Enr.category-user.anonyme') }}</option>
            </select>
            @error('categorie')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div id="imageVue">
            <ul class="listImage">
            </ul>
            <div class="imageDefault"></div>
            <div class="imageCharger">
                <div id="image"></div>
            </div>
        </div>
        <section id="masquer">
            <div>
                <label>{{ __('Enr.enregistrer-nom') }}:</label><input type="text" name="nom" value="{{ old('nom') }}"
                    required autocomplete="nom" />
                @error('nom')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label>{{ __('Enr.enregistrer-prenom') }}:</label><input type="text" name="prenoms"
                    value="{{ old('prenoms') }}" />
                @error('prenoms')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label>Date de naissance:</label>
                <input type="date" name="dateNaiss" value="{{ old('dateNaiss') }}" />
                @error('dateNaiss')
                <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <label>{{ __('Enr.enregistrer-addresse') }}:</label><input type="text" name="addresse"
                    value="{{ old('addresse') }} " />
                @error('addresse')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label>{{ __('Enr.enregistrer-rue') }}:</label><input type="text" name="rue"
                    value="{{ old('rue') }} " />
                @error('rue')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label>{{ __('Enr.enregistrer-App') }}:</label>
                <input type="text" name="appart" placeholder="{{ __('Enr.holder') }}" value="{{ old('appart') }}" />

                @error('appart')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <select class="pays " name="pays">
                    <option value="" {{ old('pays') ?? 'selected'  }}>
                        {{ old('pays') ? old('pays'): __('Enr.enregistrer-pays') }}</option>
                    <option value="canada">Canada</option>
                    <option value="usa">Usa</option>
                </select>
                @error('pays')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <select class="province cache" name="province">
                    <option value="" {{ old('province') ?? 'selected'  }}>
                        {{ old('province') ? old('province'): __('Enr.enregistrer-province') }}</option>
                </select>
                @error('province')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <select class="ville cache " name="ville">
                    <option value="{{ old('ville') }}">{{ __('Enr.enregistrer-ville') }}</option>
                </select>
                @error('ville')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label>{{ __('Enr.enregistrer-cp') }}:</label><input type="text" name="cp" value="{{ old('cp') }} " />
                @error('cp')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label>{{ __('Enr.enregistrer-Telephone') }}:</label><input type="text" name="Telephone"
                    value="{{ old('Telephone') }}" />
                @error('Telepone')
                <span>{{$message}}</span>
                @enderror
                <label>{{ __('Enr.enregistrer-poste') }} :</label><input type="text" name="poste"
                    placeholder="{{ __('Enr.holder') }}" value="{{ old('poste') }}" />
                @error('poste')
                <span>{{$message}}</span>
                @enderror

            </div>
        </section>
        <div class='connexion'>

            <div class="">
                <label for="email">{{ __('login.login-E-Mail') }}</label>

                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="connexion">
                <label for="password">
                    {{ __('login.login-Password') }}
                </label>

                <div class=" col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="">
                    <label for="password-confirm">{{ __('Enr.enregistrer-confirmPwd') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>
                <div>
                    @error('test')
                    <span>{{$message}}</span>
                    @enderror
                    <input type="checkbox" id="controleInfos" name="test" value="confirm">

                    <label for="controleInfos">{{ __('Enr.enregistrer-certif') }}</label>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btnInput">
                        {{ __('Enr.enregistrer-valider') }}
                    </button>
                </div>
            </div>
    </form>
</div>
@endsection