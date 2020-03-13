
@extends('layout.master')
​
@section('content')
    @include('components.nav')   
 
    <h1 class="mt-5 text-center bg-danger text-white "><u>Ajouter une image</u> </h1>
​
    <form action="{{route('saveImage')}}" method="POST" enctype="multipart/form-data">
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
            @error('age')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
​
        </div> 
        <div class="form-group">
            <label class="d-block input-group-text" for="id_categorie">categorie</label>

        <select class="form-control text-center" name="id_categorie" id="">
            @foreach ($categories as $categorie)
                @if ( old('id_categorie') ==$categorie->id)
                <option selected value="{{$categorie->id}}">{{$categorie->name}}</option>                  
                @else
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>  
                @endif
                @endforeach 
            </select>    
        </div>
​
                
            <input type="submit" value="soumettre">
        </div>
    </form> 
    
    
    @endsection