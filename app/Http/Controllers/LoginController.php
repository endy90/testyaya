<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Product as Product;

class LoginController extends Controller
{
    //
    public function login(){
        return view('Connexion.login');
    }

    //une fonction qui récupere les éléments du formulaire, check les validations
    public function connexion(){
        //regle validation
        request()->validate([
            //email required et format email
            'email'=>['required','email'],
            //password obligatoire
            'password'=>['required','min:8'],

        ]);

        if(auth()->attempt(['email'=> request('email'),'password'=> request('password')]))
        {
            if(auth()->user()->is_admin==1){
                flash('Connexion réussi')->success();
                return view('Portal.dashboard');
            }
            else{
                $users= User::all();
                $products= Product::all();
                flash('Connexion réussi')->success();
                return view('ClientPart.Portal.index',[
                    'products'=>$products,
                    'user'=>$users
                    ]);
            }
        }else{
            return back()->withErrors([
                'email'=>"Ces informations d'identification ne correspondent pas à nos enregistrements"
            ]);
        }


    }

    public function signout(){
        auth()->Logout();
        flash('Déconnexion réussi')->success();
        return redirect('/index');
    }
}
