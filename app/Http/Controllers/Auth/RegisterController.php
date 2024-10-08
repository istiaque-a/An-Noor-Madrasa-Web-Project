<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
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
            // 'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users'],
            
            // 'mobile'=> ['required', 'unique:users,phone'],

            'mobile'=> ['required', 'phone_unique', 'min:11'],
            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'phone_unique' => 'This mobile number is already registered !', // <---- pass a message for your custom validator
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   

        echo " data['mobile'] = ".$data['mobile'];
        //echo 'Gonna create ....';

        if(Auth::check()){

            $added_by= Auth::user()->id;
        }else{
            $added_by=0;
        }


        // echo " added_by = ".$added_by;

        //exit;
        return User::create([

        // $user=User::create([ //Added later by me 
            // 'name' => $data['name'],
            'name' => $data['first_name'].' '.$data['last_name'],
            'first_name'=>$data['first_name'],
            'middle_name'=>$data['middle_name'],
            'last_name'=>$data['last_name'],
            'email' => $data['email'],
            'phone'=> $data['mobile'],
            'user_type'=>1,
            'added_by'=> $added_by,
            'password' => Hash::make($data['password']),
        ]);

        // return redirect()->back()->with('message', 'You will receive a confirmation email');//Added later by me 
    }
}
