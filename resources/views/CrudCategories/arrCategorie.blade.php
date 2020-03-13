@extends('layout.master')
​
@section('content')
    @include('components.nav')
​
    
    <div class="container">
        <h1 class="text-center">Categories</h1>
        <a href="{{route('addCategorie')}}">
            <button class="btn btn-success d-block mx-auto">Ajouter une categorie</button>
        </a>
        <table class="table">
            <thead>
              <tr  class="row bg-danger text-white">
                <th class="col-2">Id</th>
                <th class="col-6">nom</th>
                <th class="col-4">Action</th>
              </tr>    
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                    <tr  class="row">
                        <td class="col-2">{{$categorie->id}}</td>
                        <td class="col-6">{{$categorie->name}}</td>
                     
                        <td class="col-4">
                            <a href="{{route('editCategorie',$categorie->id)}}"><button class="btn btn-warning">edit</button></a>
                            <a href="{{route('deleteCategorie',$categorie->id)}}"><button type='submit' class="btn btn-danger">Supprimer</button></a>
​
                        </td>
                    </tr> 
                @endforeach
            </tbody>
          </table>  
​
    
@endsection