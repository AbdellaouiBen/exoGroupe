<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;


class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('CrudCategories/arrCategorie',compact('categories'));
    }
    public function create()
    {
        return view('CrudCategories/addCategorie');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
        ]);
        $categories = new Categorie();
        $categories->name =  $request->input('name');
        $categories->save();
        return redirect()->route('arrCategorie');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $categories = Categorie::find($id);
        return view('CrudCategories/editCategorie',compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required',
        ]);
        $categories = Categorie::find($id);
        $categories->name =  $request->input('name');
        $categories->save();
        return redirect()->route('arrCategorie');
    }
 
    public function destroy($id)
    {
        $categories = Categorie::find($id);
        $categories->delete();
        return redirect()->route('arrCategorie');
    }
}
