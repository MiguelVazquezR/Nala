<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Galery;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        $categories = Category::get('name');
        $banners = Banner::with('media')->first();
        $galery = Galery::with('media')->first();
        $popularProducts = Product::with('media')->get()->take(8);

        return inertia('Landing/Home', compact('categories', 'popularProducts', 'banners', 'galery'));
    }

    public function products()
    {
        $filter = request('filter') ?? 'Todos';
        $query = request('query');
        $categories = Category::get('name');
        $products = Product::with('media')->get();

        return inertia('Landing/Products', compact('filter', 'categories', 'products', 'query'));
    }

    public function show(Product $product)
    {
        $product = $product->load('media');

        return inertia('Landing/Show', compact('product'));
    }
}
