@extends('layout.master')

@section('content')
    @include('components.nav')

    
    <div class="container">
        <h1 class="text-center">Avatars</h1>
        <a href="{{route('addAvatar')}}">
            <button class="btn btn-success d-block mx-auto">Ajouter un Avatar</button>
        </a>
        <table class="table">
            <thead>
              <tr  class="row bg-danger text-white">
                <th class="col-2">Id</th>
                <th class="col-3">nom</th>
                <th class="col-4">image</th> 
                <th class="col-3">Action</th>
              </tr>    
            </thead>
            <tbody>
                @foreach ($avatars as $avatar)
                    <tr  class="row">
                        <td class="col-2">{{$avatar->id}}</td>
                        <td class="col-3">{{$avatar->name}}</td>
                        <td class="col-4">
                            <img  class="img-fluid"  src="{{asset('storage/'.$avatar->image)}}"  alt="">
                        </td>
                        <td class="col-3">
                            <a href="{{route('editAvatar',$avatar->id)}}"><button class="btn btn-warning">edit</button></a>
                            <a href="{{route('deleteAvatar',$avatar->id)}}"><button type='submit' class="btn btn-danger">Supprimer</button></a>

                        </td>
                    </tr> 
                @endforeach
            </tbody>
          </table>  

    
@endsection