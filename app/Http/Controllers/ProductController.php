<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $products=Product::where('deleted',False)->with(['multiimage', 'category'])->get();
        $categories = Category::all();
        return view('user_view.home', compact('products', 'categories'));
    }
    public function index()
    {
        $products=Product::where('deleted',False)->with(['multiimage', 'category'])->get();
        $categories = Category::all();
        return view('user_view.product.product',compact('products','categories'));
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
    public function show($id)
    {
        $product =Product::findOrFail($id);
        return view('user_view.product.product_details',compact('product'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
