<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class cartController extends Controller
{
    public function insert(Request $request){
        $dish=Dish::where('dish_id',$request->dish_id)->first();
        Cart::add([
            'id'=>$request->dish_id,
            'qty'=>$request->qty,
            'name'=>$dish->dish_name,
            'price'=>$dish->price,
            'weight'=>550,
            'options'=>['image'=>$dish->dish_image],

        ]);
        return redirect('cart/show');
    }
    public function show(){
        $CartDish=Cart::content();
        return view('FrontEnd.cart.show',compact('CartDish'));
    }
    public function remove($rowId){
        Cart::remove($rowId);
        return back();
    }
}
