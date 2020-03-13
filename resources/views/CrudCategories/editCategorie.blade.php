@extends('layout.master')
​
@section('content')
    @include('components.nav')
    <h1 class="mt-5 text-center bg-danger text-white ">edit Categorie</h1>
​
    <form action="{{route('updateCategorie',$categories->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="text-center form-group container">    
​
        <div class="form-group">
            <label class="d-block input-group-text" for="name">name</label>
            <input class="form-control" type="text" name='name' value="{{old('name',$categories->name)}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>           
       
         
      
            <input type="submit" value="soumettre">
        </div> 
    </form>
    
@endsection