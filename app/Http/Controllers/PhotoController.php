<?php
namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('photos.index', compact('photos'));
    }

    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('photo');
        $originalName = $file->getClientOriginalName();
        $name = time() . '_' . $originalName;
        $path = $file->storeAs('photos', $name, 'private');

        $photo = new Photo();
        $photo->original_name = $originalName;
        $photo->name = $name;
        $photo->path = 'photos/' . $name; // Asegúrate de que la ruta se almacene correctamente
        $photo->save();

        return redirect()->route('photos.index');
    }

    public function view(Photo $photo)
    {
        $path = storage_path('app/private/' . $photo->path);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file, 200)->header('Content-Type', $type);
    }
}