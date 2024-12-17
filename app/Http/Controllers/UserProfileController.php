<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= Auth::user();
        $orders= Order::where('user_id',$user->id)->get();
        return view('user_view.profile.profile', compact('user','orders'));
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
    public function orderStore(Request $request)
    {
        $items = json_decode($request->input('items'), true);
        if(empty($items))
        {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        $order = Order::create(['user_id'=> Auth::id()]);
        foreach ($items as $item) {
            $itemModel = Item::find($item['id']);
            $product = Product::find($item['product_id']);
            $product->update([
                'quantity'=> $product->quantity -= $item['quantity'],
            ]);
            $itemModel->update([
                'cart_id'=> null,
                'order_id'=> $order->id,
            ]);
        }
        return redirect()->route('userProfile.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('user_view.profile.order_datials',compact('order'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(view('user_view.home'));
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
