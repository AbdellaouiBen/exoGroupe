<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Avatar;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function index(){
        $users = User::all();
        $avatars = Avatar::all();
        return view('CrudUsers/arrUser',compact('users','avatars'));
    }

    public function create()
    {
        $avatars = Avatar::all();
        return view('CrudUsers/addUser',compact('avatars'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'age'=>'required|integer|max:140',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4',
        ]);
        $users = new User();

        $users->name =  $request->input('name');
        $users->age =  $request->input('age');
        $users->email =  $request->input('email');
        $users->password =  $request->input('password');
        $users->id_avatar =  $request->input('id_avatar');

        $users->save();

        return redirect()->route('arrUser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $avatars = Avatar::all();
        return view('CrudUsers/editUser',compact('avatars','users'));
    }

    /**   
     * Update the specified resource in storage.
     *
     
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $users = User::find($id);
        $validatedData = $request->validate([
            'name'=>'required',
            'age'=>'required|integer|max:140',     
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:4',
            
            ]); 
           
        $users->name =  $request->input('name');
        $users->age =  $request->input('age');
        $users->email =  $request->input('email'); 
        $users->id_avatar =  $request->input('id_avatar');
        
        $users->save();

        return redirect()->route('arrUser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('arrUser');
    }
}
