<?php

namespace App\Http\Controllers;

use App\Models\Facturation;
use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Product as Product;
use App\Models\Comment as Comment;

class ClientsController extends Controller
{
    public function index(){
        
        $products= Product::all();
        return view('ClientPart.Layout.indexTemplate',[
            'products'=>$products,
        ]);
    }

    public function profile(){
        $user= auth()->user();
        $facturation = Facturation::all();
        return view('ClientPart.Portal.profile',[
            'user'=>$user,
            'facturation'=>$facturation,
        ]);
    }
    public function form_updateprofile(){
        $user= auth()->user();
        return view('ClientPart.Portal.updateprofile',[
            'user'=>$user
        ]);
    }
    public function updateprofile()
    {
        request()->validate([
            'email'=>['required'],
            'nom'=>['required'],
            'prenom'=>['required'],
            'date_de_naissance'=>['required'],
        ]);
        $id=request('id');
        User::where('id',$id)->first()->update([
            'email'=>request('email'),
            'nom'=>request('nom'),
            'prenom'=>request('prenom'),
            'date_de_naissance'=>request('date_de_naissance'),
        ]);
        flash('Vous avez réussi de mettre à jour')->success();
        return redirect('/profile');
    }
    public function search()
    {
        $search=request('search');
        $products=Product::all()->where('nom','like',$search);
        return view('ClientPart.Portal.recherche',[
            'products'=>$products,
        ]);
    }
    public function comment()
    {
        request()->validate([
            'id_user'=> ['required'],
            'id_product'=> ['required'],
            'comments'=> ['required'],
        ]);
        $id_product= request('id_product');
        $comments= Comment::create([
            'id_user'=> request('id_user'),
            'id_product'=>request('id_product'),
            'comments'=>request('comments'),
        ]);
        flash('Vous avez réussi à ajouter un commentaire')->success();
        return back();
    }
}
