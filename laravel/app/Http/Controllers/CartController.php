<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $cart = $request->session()->get('cart', []);
        $cart[$product->id] = $product;
        $request->session()->put('cart', $cart);
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function removeFromCart(Request $request, string $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    public function resetCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('cart.show');
    }
}
