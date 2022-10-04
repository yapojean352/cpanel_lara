@extends('layouts.app')
@section('content')
<h1>{{ __('menu.menu-historique') }}</h1>
<table id="p">
        <thead>
            <tr>
                <th>{{ __('velo.marque') }}</th>
                <th>{{ __('velo.modele') }}</th>
                <th class="masque"> {{ __('velo.couleur') }}</th>
                <th class="masque">{{ __('velo.grandeur') }}</th>
                <th>{{ __('velo.model-action') }}</th>
            </tr>
        </thead>
       
        @foreach($histVelos as $velo)
        <tbody>
            <tr>
                <td style="text-align: center;">{{$velo->marque}}</td>
                 <td>{{$velo->modele}}</td>
                <td class="masque">{{$velo->couleur}}</td>
                <td class="masque" style="text-align: center;">{{$velo->grandeur}}</td>
                <td>    
                <a href="{{route('detail',['id'=>$velo->id])}}">{{ __('velo.model-detail') }}<span class="iconify" data-inline="false" data-icon="dashicons:edit" style="color: blue; font-size: 20px;" data-flip="horizontal"></span></a>  
                </td>      
            </tr>
            
        </tbody>  
        @endforeach 
    </table>
    <div class="paginate">
    <span>{{$histVelos->links()}}</div>
    </div>
    <style>
        .w-5{
            display:none;
        }
    </style>
    @endsection