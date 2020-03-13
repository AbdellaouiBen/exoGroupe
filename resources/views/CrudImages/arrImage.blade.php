@extends('layout.master')
​
@section('content')
    @include('components.nav')
​
    
    <div class="container">
        <h1 class="text-center">Images</h1>
        <a href="{{route('addImage')}}">
            <button class="btn btn-success d-block mx-auto">Ajouter une Image</button>
        </a>
        <table class="table">
            <thead>
              <tr  class="row bg-danger text-white">
                <th class="col-1">Id</th>
                <th class="col-2">nom</th>
                <th class="col-3">image</th> 
                <th class="col-1">id_categorie</th> 
                <th class="col-3">Action</th>
              </tr>    
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr  class="row">
                        <td class="col-1">{{$image->id}}</td>
                        <td class="col-2">{{$image->name}}</td>
                        <td class="col-3">
                            
                            <img  class="img-fluid"  src="{{asset('storage/'.$image->images)}}"  alt="">
                        </td>
                        <td class="col-1">{{$image->id_categorie}}</td>
                        <td class="col-3">
                            <a href="{{route('editImage',$image->id)}}"><button class="btn btn-warning">edit</button></a>
                            <a href="{{route('deleteImage',$image->id)}}"><button type='submit' class="btn btn-danger">Supprimer</button></a>
                            <a href="{{route('downloadImage',$image->id)}}"><button type='submit' class="btn btn-danger">download</button></a>
​
                        </td>
                    </tr> 
                @endforeach
            </tbody>
          </table>  
​
    
@endsection