<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::with('media')->where('id', 1)->first();

        // return $banners;
        return inertia('Banner/Index', compact('banners'));
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
        $banner = Banner::create();

        // Guardar el archivo en la colección 'banner1'
        if ($request->hasFile('banner1')) {
            $banner->addMediaFromRequest('banner1')->toMediaCollection('banner1');
        }

        // Guardar el archivo en la colección 'banner2'
        if ($request->hasFile('banner2')) {
            $banner->addMediaFromRequest('banner2')->toMediaCollection('banner2');
        }

        // Guardar el archivo en la colección 'banner3'
        if ($request->hasFile('banner3')) {
            $banner->addMediaFromRequest('banner3')->toMediaCollection('banner3');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }


    public function updateWithMedia(Request $request, Banner $banner)
    {
        // Eliminar imágenes antiguas solo si se borró desde el input y no se agregó una nueva
        if ($request->clearedBanner1) {
            $banner->clearMediaCollection('banner1');
        }

        if ($request->clearedBanner2) {
            $banner->clearMediaCollection('banner2');
        }

        if ($request->clearedBanner3) {
            $banner->clearMediaCollection('banner3');
        }

        // Eliminar imágenes antiguas solo si se proporcionan nuevas imágenes
        if ($request->hasFile('banner1')) {
            $banner->clearMediaCollection('banner1');
        }

        if ($request->hasFile('banner2')) {
            $banner->clearMediaCollection('banner2');
        }

        if ($request->hasFile('banner3')) {
            $banner->clearMediaCollection('banner3');
        }

        // Guardar el archivo en la colección 'banner1'
        if ($request->hasFile('banner1')) {
            $banner->addMediaFromRequest('banner1')->toMediaCollection('banner1');
        }

        // Guardar el archivo en la colección 'banner2'
        if ($request->hasFile('banner2')) {
            $banner->addMediaFromRequest('banner2')->toMediaCollection('banner2');
        }

        // Guardar el archivo en la colección 'banner3'
        if ($request->hasFile('banner3')) {
            $banner->addMediaFromRequest('banner3')->toMediaCollection('banner3');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
