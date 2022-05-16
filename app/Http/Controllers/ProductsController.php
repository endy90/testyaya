<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Comment as Comment;
use App\Models\User as User;
class ProductsController extends Controller
{
    public function product($id){
        if (auth()->guest()){
            $product= Product::where('id',$id)->first();
            $comments=Comment::all()->where('id_product',$id);
            return view('ClientPart.Layout.productTemplate',[
                'product'=>$product,
                'comments'=>$comments,
            ]);
        }
        else{
            $product= Product::where('id',$id)->first();
            $user= auth()->user();
            $comments=Comment::all()->where('id_product',$id);
            return view('ClientPart.Layout.productTemplate',[
                'user'=>$user,
                'product'=>$product,
                'comments'=>$comments,
        ]);
        }
        
    }
}
