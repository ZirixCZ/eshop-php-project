<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
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
            return response()->view("products.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        $p = Product::create($request->validated());
        if ($p) {
            return redirect()->route("dashboard");
        } else {
            return redirect()->back();
        }
        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view("products.edit", [
            "product" => Product::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id) : RedirectResponse
    {
        $p = Product::findOrFail($id);

        if ($p->update($request->validated())) {
            return redirect()->route("dashboard");
        } else {
            return abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p = Product::findOrFail($id);

        if ($p->delete()) {
            return redirect()->route("dashboard");
        } else {
            return abort(500);
        }

    }

    /**
     * Add product to cart
     */
    public function addToCart(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $cart = $request->session()->get('cart', []);
        $cart[$product->id] = $product;
        $request->session()->put('cart', $cart);
        return redirect()->route('dashboard');
    }
}
