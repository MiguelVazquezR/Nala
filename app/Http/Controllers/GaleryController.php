<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galery = Galery::with('media')->where('id', 1)->first();

        // return $galery;

        return inertia('Galery/Index', compact('galery'));
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
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery)
    {
        //
    }

    public function updateWithMedia(Request $request, Galery $galery)
    {
        // // Eliminar imágenes antiguas solo si se borró desde el input y no se agregó una nueva
        // if ($request->clearedBanner1) {
        //     $galery->clearMediaCollection('banner1');
        // }

        // if ($request->clearedBanner2) {
        //     $galery->clearMediaCollection('banner2');
        // }

        // if ($request->clearedBanner3) {
        //     $galery->clearMediaCollection('banner3');
        // }

        // // Eliminar imágenes antiguas solo si se proporcionan nuevas imágenes
        // if ($request->hasFile('banner1')) {
        //     $galery->clearMediaCollection('banner1');
        // }

        // if ($request->hasFile('banner2')) {
        //     $galery->clearMediaCollection('banner2');
        // }

        // if ($request->hasFile('banner3')) {
        //     $galery->clearMediaCollection('banner3');
        // }

        // // Guardar el archivo en la colección 'banner1'
        // if ($request->hasFile('banner1')) {
        //     $galery->addMediaFromRequest('banner1')->toMediaCollection('banner1');
        // }

        // // Guardar el archivo en la colección 'banner2'
        // if ($request->hasFile('banner2')) {
        //     $galery->addMediaFromRequest('banner2')->toMediaCollection('banner2');
        // }

        // // Guardar el archivo en la colección 'banner3'
        // if ($request->hasFile('banner3')) {
        //     $galery->addMediaFromRequest('banner3')->toMediaCollection('banner3');
        // }

        // eliminar ultimo elemento en arreglo imagenes, ya que está vacío
        $images = $request->images;
        $last_index = count($images) - 1;
        unset($images[$last_index]);

         // Subir y asociar la imagen
         $galery->clearMediaCollection();
         $galery->addAllMediaFromRequest()->each(fn ($file) => $file->toMediaCollection());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        //
    }
}
