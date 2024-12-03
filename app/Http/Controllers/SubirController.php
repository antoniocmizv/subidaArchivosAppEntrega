<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Subir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SubirController extends Controller
{
    public function index()
    {
        $subirs = Photo::orderBy('nombre_original')->paginate(2);
        return view('subir.index', compact('subirs'));
    }

    public function create()
    {
        return view('subir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
        $fileName = $timestamp . '_' . $originalName;
        $filePath = 'ejercicio/' . $fileName;

        Storage::disk('private')->putFileAs('ejercicio', $file, $fileName);

        $link = ('ejercicio/' . $fileName);

        Photo::create([
            'nombre_original' => $originalName,
            'nombre' => $fileName,
            'link' => $link,
        ]);

        return redirect()->route('subir.index');
    }

    public function show($id)
    {
        $subir = Photo::findOrFail($id);
        return view('subir.show', compact('subir'));
    }

    public function view(Photo $photo)
    {
        $path = storage_path('app/private/' . $photo->link);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file, 200)->header('Content-Type', $type);
    }

    public function destroy($id)
{
    $photo = Photo::findOrFail($id);
    $path = storage_path('app/private/' . $photo->link);

    if (file_exists($path)) {
        unlink($path);
    }

    $photo->delete();

    return redirect()->route('subir.index')->with('success', 'Foto eliminada correctamente.');
}

}

