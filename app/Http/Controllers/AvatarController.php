<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Avatar;
use Illuminate\Support\Facades\Storage;


class AvatarController extends Controller
{
    
    public function index()
    {
        $avatars = Avatar::all();
        return view('CrudAvatars/arrAvatar',compact('avatars'));
    }
    public function create()
    {
        $avatars = Avatar::all();

        if (count($avatars)<5) {
            return view('CrudAvatars/addAvatar');        
        } else {
            return redirect()->route('arrAvatar');
        }
        
        
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image'=>'required|image',
            'name'=>'required',
        ]);

        $avatars = new Avatar();
        $img = $request->file('image');
        $newName = Storage::disk('public')->put('',$img);	
        $avatars->image =  $newName;
        $avatars->name =  $request->input('name');
        $avatars->save();

        return redirect()->route('arrAvatar');
    }
    public function show(Avatar $avatar)
    {
        //
    }
    public function edit( $id)
    {
        $avatars = Avatar::find($id);
        return view('CrudAvatars/editAvatar',compact('avatars'));
    }
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'image'=>'required|image',
            'name'=>'required',
        ]);
            
        $avatars = Avatar::find($id);
        Storage::disk('public')->delete($avatars->image);

       
        $img = $request->file('image');
        $newName = Storage::disk('public')->put('',$img);	

        $avatars->image =  $newName;
        $avatars->name =  $request->input('name');

        $avatars->save();

        return redirect()->route('arrAvatar');
    }

 
    public function destroy( $id)
    {
        $avatars = Avatar::find($id);
        Storage::disk('public')->delete($avatars->image);

        $avatars->delete();
        return redirect()->route('arrAvatar');
    }
}
