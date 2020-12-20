<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $products = Product::all();
            return response()->json($products);
        }
    }

    public function register(Request $request) {
        
        $product = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description')
        ]);
        $product->save();
        return response()->json('success');
    }

    public function edit($id) {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request) {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->save();  
        return response()->json('Successfully Update');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Successfully Delted');
    }
}
