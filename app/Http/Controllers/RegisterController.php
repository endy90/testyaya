<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
class RegisterController extends Controller
{
    //
    public function register(){
        return view('Connexion.register');
    }
    public function CreateUser(){
        //regle validation
        request()->validate([
            //email required et format email
            'email'=>['required'],
            //password obligatoire, min 8 caracteres, password= confirmation_password
            'password'=>['required','min:8','required-with:confirm-password','same:confirm-password'],
            //nom obligatoire
            'nom'=>['required'],
            'prenom'=>['required'],
            'date_de_naissance'=>['required'],
            //confirmation password obligatoire
            'confirm-password'=>['required'],

        ]);
        $user= User::create([
            'email'=> request('email'),
            'password'=>bcrypt(request('password')),
            'nom'=>request('nom'),
            'prenom'=>request('prenom'),
            'date_de_naissance'=>request('date_de_naissance')
        ]);
        flash('Votre compte a bien été créer ! Vous pouvez donc vous authentifier.')->success();
        return redirect('/login');
    }
}
