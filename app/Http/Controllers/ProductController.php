<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('media')->get();

        return inertia('Product/Index', compact('products'));
    }

    
    public function create()
    {

        $products_quantity = Product::all()->count();
        $categories = Category::whereNotIn('id', [1])->get('name');

        return inertia('Product/Create', compact('categories', 'products_quantity'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'discount_price' => 'nullable|numeric|min:0|max:999999.99|lt:'.$request->price,
        ]);
        
        $product = Product::create($request->except(['image_cover1', 'image_cover1']));

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

    
    public function edit($product_id)
    {
        $product = Product::with('media')->find($product_id);
        $categories = Category::whereNotIn('id', [1])->get('name');

        return inertia('Product/Edit', compact('product', 'categories'));
    }

    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'discount_price' => 'nullable|numeric|min:0|max:999999.99|lt:'.$request->price,
        ]);

        $product->update($request->except(['image_cover1', 'image_cover1']));

        // Eliminar imágenes antiguas solo si se borró desde el input y no se agregó una nueva
        if ($request->clearedCover1) {
            $product->clearMediaCollection('cover1');
        }

        if ($request->clearedCover2) {
            $product->clearMediaCollection('cover2');
        }

        return to_route('products.index');
    }


    public function updateWithMedia(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
        ]);

        $product->update($request->all());

            // update image

            // Eliminar imágenes antiguas solo si se borró desde el input y no se agregó una nueva
            if ($request->clearedCover1) {
                $product->clearMediaCollection('cover1');
            }

            if ($request->clearedCover2) {
                $product->clearMediaCollection('cover2');
            }

            // Eliminar imágenes antiguas solo si se proporcionan nuevas imágenes
            if ($request->hasFile('image_cover1')) {
                $product->clearMediaCollection('cover1');
            }

            if ($request->hasFile('image_cover2')) {
                $product->clearMediaCollection('cover2');
            }

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

   
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index');
    }
}
