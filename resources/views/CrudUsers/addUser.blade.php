@extends('layout.master')

@section('content')
    @include('components.nav')   
 
    <h1 class="mt-5 text-center bg-danger text-white "><u>Ajouter un User</u> </h1>

    <form action="{{route('saveUser')}}" method="POST" >
        @csrf
    
    <div class="text-center form-group container">    
        <div class="form-group">
            <label class="d-block input-group-text" for="name">name</label> 
            <input class="form-control" placeholder="name" type="text " name='name' value="@if($errors->first('name'))@else{{ old('name') }}@endif">      
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror   
        </div>           
        <div class="form-group">
            <label class="d-block input-group-text" for="age">age</label>
            <input class="form-control @error('age') is-invalid @enderror" placeholder="age" type="number" name='age' value="@if($errors->first('age'))@else{{old('age')}}@endif">
            @error('age')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="d-block input-group-text" for="password">mot de passe</label>
            <input class="form-control @error('password') is-invalid @enderror" placeholder="password" type="password" name='password' >
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
        </div>
        <div class="form-group">
            <label class="d-block input-group-text" for="email">email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name='email' value="@if($errors->first('email'))@else{{old('email')}}@endif">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="d-block input-group-text" for="titre">id_avatar</label>
            
            <select class="form-control text-center" name="id_avatar" id="">
                @foreach ($avatars as $avatar)
                    @if ( old('id_avatar') ==$avatar->id)
                        <option selected value="{{$avatar->id}}">{{$avatar->name}}</option>                  
                    @else
                        <option value="{{$avatar->id}}">{{$avatar->name}}</option>  
                    @endif
                    @endforeach 
                </select>    
            </div>   


                
            <input type="submit" value="soumettre">
        </div>
    </form> 
    
    
    @endsection 
