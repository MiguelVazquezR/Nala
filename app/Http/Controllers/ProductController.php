<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('media')->get();

        // return $products;
        return inertia('Product/Index', compact('products'));
    }

    
    public function create()
    {
        return inertia('Product/Create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
        ]);
        
        $product = Product::create($request->except('media'));

        // Guardar el archivo en la colección 'image_cover1'
        if ($request->hasFile('image_cover1')) {
            $product->addMediaFromRequest('image_cover1')->toMediaCollection('cover1');
        }

        // Guardar el archivo en la colección 'image_cover2'
        if ($request->hasFile('image_cover2')) {
            $product->addMediaFromRequest('image_cover2')->toMediaCollection('cover2');
        }

        return to_route('products.index');
        
    }

    
    public function show(Product $product)
    {
        //
    }

    
    public function edit(Product $product)
    {
        //
    }

    
    public function update(Request $request, Product $product)
    {
        //
    }

   
    public function destroy(Product $product)
    {
        //
    }
}
