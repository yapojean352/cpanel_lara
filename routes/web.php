<?php
//use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 //app()->setLocale('en');
Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
Route::view('/', 'velos.acceuil')->name('acceuil');
//======== VELO=====================================
Route::get('/historique','App\Http\Controllers\VelosController@historique')->name('historique');
Route::get('/detail/{id}','App\Http\Controllers\VelosController@detail')->name('detail')->middleware('auth');
////////////fin historique/////////////////////////
Route::get('/listeVelos','App\Http\Controllers\VelosController@getListeVelos')->name('listeVelos');
//route supprimmer une photo
Route::get('/photoSupp/{id}','App\Http\Controllers\photoController@destroy')->name('photo.supprimer')->middleware('auth');
//supprimer un velo
Route::get('/supprimer/{id}','App\Http\Controllers\VelosController@destroy')->name('velo.supprimer')->middleware('auth');
//route pour creer le formulaire [App \ Http \ Controllers \ VelosController]
Route::get('/velos/create','App\Http\Controllers\VelosController@create')->name('velos.create')->middleware('auth');

//route qui tarite et valier les donnes avan t d enregistrer 
Route::get('/monvelo','App\Http\Controllers\VelosController@show')->name('velo.show')->middleware('auth');
//ajouter un velo si deja inscrire
Route::post('/velos','App\Http\Controllers\VelosController@store')->name('velos.store');
//recuperer le velo de user
Route::get('/velos/{id}/','App\Http\Controllers\VelosController@showOneVelo')->name('velos.showone');
//route suppression  showOneVelo
Route::get('/velos/{id}/edit','App\Http\Controllers\VelosController@edit')->name('velos.edit')->middleware('auth');
//pour traiter le modification
Route::PATCH('/velos/{id}','App\Http\Controllers\VelosController@update')->name('velos.update');

//routes pour accedre au formumalire pour se connecter
Auth::routes();
//page home controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});