<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Categorie;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(){
        $images = Image::all();
        $categories = Categorie::all();
        return view('CrudImages/arrImage',compact('images','categories'));
    }
    public function create()
    {
        $categories = Categorie::all();
        return view('CrudImages/addImage',compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'image'=>'required|image',
        ]);
        $images = new Image();
        $img = $request->file('image');
        $newName = Storage::disk('public')->put('',$img);
        $images->images =  $newName;

        $images->name =  $request->input('name');
        $images->id_categorie =  $request->input('id_categorie');
        $images->save();
        return redirect()->route('arrImage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $images = Image::find($id);
        $categories = Categorie::all();
        return view('CrudImages/editImage',compact('images','categories'));
    }

    public function update(Request $request, $id)
    {
        $images = Image::find($id);
        Storage::disk('public')->delete($images->image);
        $img = $request->file('image');
        $newName = Storage::disk('public')->put('',$img);
        $images->images =  $newName;

        $images->name =  $request->input('name');
        $images->id_categorie =  $request->input('id_categorie');
        $images->save();
        return redirect()->route('arrImage'); 
    }
 
    public function destroy($id)
    { 
        $images = Image::find($id);
        Storage::disk('public')->delete($images->image);

        $images->delete();
        return redirect()->route('arrImage');
    }
    public function download($id)
    {
        $images = Image::find($id);
        $extension = pathinfo(storage_path('storage/'.$images->images), PATHINFO_EXTENSION);         
        return Storage::disk('public')->download($images->images,$images->name.'.'.$extension);
    }
}
