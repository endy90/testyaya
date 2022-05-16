<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\Facturation as Facturation;
use App\Models\Product as Product;
use App\Models\User as User;
use DateTime;

class CartsController extends Controller
{
    public function cart(){
        $users = auth()->user();
        return view("ClientPart.Portal.cart",[
            'user'=>$users,
        ]);
    }

    public function add(Request $request){
        $product = Product::find($request->id);

        if(auth()->user()){

            Cart::add(array(
                'id' => $product->id,
                'name' => $product->nom,
                'price' => $product->prix,
                'quantity' => 1,
                'attributes' => array()
            ));
            flash('Cet article a bien été ajouté à votre panier')->success();
            return back();
        }
        else{
            flash('Vous devez être connecté pour cela')->error();
            return back();
        }

    }

    // public function quantityUp(){

    //     Cart::update(1 /*productID*/,[
    //         'quantity' => [
    //             'relative' => true, //(false = écrase la valeur/ true = incremente de la valeur)
    //             'value' => 1
    //         ],
    //     ]);

    // }
    // public function quantityDown(){

    //     Cart::update(1 /*productID*/,[
    //         'quantity' => [
    //             'relative' => true, //(false = écrase la valeur/ true = incremente de la valeur)
    //             'value' => -1
    //         ],
    //     ]);

    // }

    public function clear(){
        Cart::clear();

        flash('Votre panier a bien été vidé')->success();
        return back();
    }

    public function payment(Request $request){

        $user= auth()->user();
        $product = Product::where($request->id)->first();
        $productCart = Cart::getContent()->first();

        if($user->solde >= Cart::getSubTotal()){
            $paiement = $user->solde - Cart::getSubTotal();

            $user->update([
                'solde'=>request('solde',$paiement),
            ]);

                $facturation = Facturation::create([
                'productID'=>request('productID',$productCart->id),
                'nom'=> request('nom',$productCart->name),
                'quantite'=>request('quantite',$productCart->quantity),
                'prix'=>request('prix',Cart::getSubTotal()),
                'code'=>request('code',$product->code),
                'date_achat'=>request('date_achat', new DateTime()),
            ]);

            Cart::clear();
            flash('Votre commande a bien été effectuer')->success();
            return back();
        }
        else
        {
            flash('Votre solde est insuffisant')->error();
            return back();
        }

        //Creer une facture qui selon le ProductID contient : Nom / Prix / Quantité acheté / Code / Date d'achat, disponible sur le profil de l'user pour envoie mail
    }
}
