<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        return inertia('Product/Index');
    }

    
    public function create()
    {
        return inertia('Product/Create');
    }

    
    public function store(Request $request)
    {
        //
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
