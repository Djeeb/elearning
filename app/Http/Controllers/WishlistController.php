<?php

namespace App\Http\Controllers;

use App\Course;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /* public function index(){
        return view('wishlist.index');
    } */
    
    public function store($id){
        $course = Course::find($id);
        
        $wishlist = \Cart::session(Auth::user()->id.'_wishlist');
        $wishlist->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);
        return redirect()->route('cart.index')->with('success', 'Cours ajouté à votre liste de souhaits !');
    }

    public function destroy($id){
        \Cart::session(Auth::user()->id.'_wishlist')->remove($id);
        return redirect()->route('cart.index')->with('success', 'Cours supprimé de votre liste de souhaits !');
    }

    public function toCart($id){
        $course = Course::find($id);
        \Cart::session(Auth::user()->id.'_wishlist')->remove($id);
        $add = \Cart::session(Auth::user()->id)->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);
        return redirect()->route('cart.index')->with('success', 'Cours transféré de votre liste de souhaits à votre panier avec succès !');
    }


    public function toWishlist($id){
        $course = Course::find($id);
        \Cart::session(Auth::user()->id)->remove($id);
        $add = \Cart::session(Auth::user()->id.'_wishlist')->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);
        return redirect()->route('cart.index')->with('success', 'Cours transféré de votre panier à votre liste de souhaits avec succès !');
    
    }
}
