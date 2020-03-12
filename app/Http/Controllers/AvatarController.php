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
        return view('CrudAvatars/addAvatar');
    }


    public function store(Request $request)
    {
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
