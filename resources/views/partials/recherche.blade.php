<?php use App\Models\type_velo;?>
<form class="recherch" action="{{ route('listeVelos')}}">
        <input type="text" name="as" class="form-control input-recherche" placeholder=" {{ __('menu.menu-recherche') }}..." value="{{ request()->as ?? '' }}">
    <button type="submit" class="btnR"><i class="fa fa-search"style=" color:white ;" ></i></button>
</form>
