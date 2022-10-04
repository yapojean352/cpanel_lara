<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ACCEUIL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'nom'=>['required','string'],
            'prenoms'=>['required','string'],
            'dateNaiss'=>['required','string'],
            'addresse'=>['required','string'],
             'categorie'=>['required','string'],
             'rue'=>['required','string'],
             'appart'=>['min:0'],
           'province'=>['min:0'],
           'ville'=>['min:0'],
             'pays'=>['min:0'],
            'cp'=>['required','string'],
          'Telephone'=>['required','string'],
          'poste'=>['min:0'],
          'test'=>['required'],
           // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        //recuperer le dernier id de l utlisateur
          
    }
     
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(request()->post('test')=="confirm" ){
        return User::create([
              'nom'=>$data['nom'],
                'prenoms'=>$data['prenoms'],
               'dateNaiss'=>$data['dateNaiss'],
                'adrresse'=>$data['addresse'], 
                'rue'=>$data['rue'],
               'numAppart'=>$data['appart'],
                'province'=>$data['province'],
                'ville'=>$data['ville'],
               'typeusers_id'=>$data['categorie'],
                'pays'=>$data['pays'],
              'codePostal'=>$data['cp'],
                  'telephone'=>$data['Telephone'],
               'poste'=>$data['poste'],
              'email' => $data['email'],
                'password' => Hash::make($data['password']),
        ]);
      
    }
   
    }
}
