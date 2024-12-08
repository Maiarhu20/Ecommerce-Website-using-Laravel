<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\MultiImage;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function index()
    {
        return view('admin.index');
    }
//--------------------------------------------------------------------------------


    public function AllProducts()
    {
        $user= Auth::user();
        $products = Product::all();
        return view('admin.products.index', compact('products','user'));
    }


    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer',
        ]);

        $product = Product::create([
            'name'=>$request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('upload/products'), $image_name);

                MultiImage::create([
                    'image_path' => $image_name,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }



    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only('name', 'description', 'price', 'category_id', 'quantity'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('upload/products'), $image_name);
                MultiImage::create([
                    'image_path' => $image_name,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect()->route('admin.products.index');
    }

    public function destroyProduct($id)
    {

        $product = Product::findOrFail($id);
        $product->multiimage()->delete();
        Item::where('product_id',$id)->delete();
        $product->delete();

        return redirect()->route('admin.products.index');
    }
//-------------------------------------------------------------------------------------------------------------


    public function AllCategories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function createCategory()
    {
        return view('admin.categories.create');
    }


    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('image_slide')) {
            $image = $request->file('image_slide');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload/categories'), $image_name);
            $data['image_slide'] = $image_name;
        }

        if ($request->hasFile('image_banner')) {
            $image = $request->file('image_banner');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload/categories'), $image_name);
            $data['image_banner'] =$image_name;
        }

        Category::create($data);
        return redirect()->route('admin.categories.index');
    }


    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));

    }


    public function updateCategory(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');


        if ($request->hasFile('image_slide')) {
            $image_slide = $request->file('image_slide');
            $image_slide_name =$image_slide->getClientOriginalName();
            $image_slide->move(public_path('upload/categories'), $image_slide_name); // Store the new image
            $category->image_slide = $image_slide_name; // Save the new image name to the category
        }

        if ($request->hasFile('image_banner')) {
            $image_banner = $request->file('image_banner');
            $image_banner_name = time() . '-' . $image_banner->getClientOriginalName();
            $image_banner->move(public_path('upload/categories'), $image_banner_name); // Store the new image
            $category->image_banner = $image_banner_name; // Save the new image name to the category
        }
        $category->save();

        return redirect()->route('admin.categories.index');
    }


    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        foreach ($category->products as $product) {
            $this->destroyProduct($product->id);
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }



//--------------------------------------------------------------------------------------------

    public function AllOrders()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder($orderId){
        // return view('admin.orders.orderDetails');
        $order = Order::findOrFail($orderId);
        return view('admin.orders.orderDetails',compact('order'));
    }

    public function removeOrder($orderId){

        $order = Order::findOrFail($orderId);
        $order->items()->delete();
        $order->delete();
        return redirect()->route('admin.orders.index');
    }


}




// public function deleteImage($image_path,$product_id)
// {
//     $image = MaltiImage::findOrFail($image_path);

//     // Remove the image file from storage
//     // $imagePath = public_path('upload/products/' . $image->image_path);
//     // if (file_exists($image_path)) {
//     //     unlink($image_path);
//     // }

//     // Delete the image record from the database
//     $image->delete();

//     return redirect()->route('products.update')->with('success', 'Image deleted successfully');
// }
