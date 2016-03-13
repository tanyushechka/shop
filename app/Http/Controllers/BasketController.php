<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BasketController extends Controller
{
    public function index()
    {
        $products = Product::whereIn('id', array_keys(session()->get('basket', [])))->get();
        $totalSum = 0;
        foreach($products as $product) {
            $quantity = session()->get('basket.' . $product->id);
            $totalSum += $product->price * $quantity;
        }
        return view('basket.index', compact('products', 'totalSum'));
//        return session()->get('products', []);
    }

    public function addToBasket(Request $request)
    {
        session()->put('basket.' . $request->product_id, 1);
        return ['message' => 'product is added', 'sum' => array_sum(session('basket'))];
    }

    public function removeFromBasket($id)
    {
        session()->forget('basket.' . $id);
        return back();
    }

    public function changeQuantity(Request $request)
    {
        session()->put('basket.' . $request->product_id, $request->quantity);
        return ['message' => 'quantity is changed', 'sum' => array_sum(session('basket'))];
    }
}
