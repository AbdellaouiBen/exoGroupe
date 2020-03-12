@extends('layout.master')

@section('content')
    @include('components.nav')   
 
    <h1 class="mt-5 text-center bg-danger text-white "><u>Ajouter un Avatar</u> </h1>

    <form action="{{route('saveAvatar')}}" method="POST" enctype="multipart/form-data">
        @csrf
    
    <div class="text-center form-group container">    
                  
        <div class="form-group">
            <label class="d-block input-group-text" for="name">name</label>
            <input class="form-control @error('name') is-invalid @enderror" placeholder="name" type="text" name='name' value="@if($errors->first('name'))@else{{old('name')}}@endif">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="d-block input-group-text" for="image">image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name='image' >
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
                
            <input type="submit" value="soumettre">
        </div>
    </form> 
    
    
    @endsection 