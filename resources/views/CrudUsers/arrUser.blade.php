@extends('layout.master')

@section('content')
    @include('components.nav')

    
    <div class="container">
        <h1 class="text-center">Users</h1>
        <a href="{{route('addUser')}}">
            <button class="btn btn-success d-block mx-auto">Ajouter un User</button>
        </a>
        <table class="table">
            <thead>
              <tr  class="row bg-danger text-white">
                <th class="col-1">Id</th>
                <th class="col-2">nom</th>
                <th class="col-2">age</th> 
                <th class="col-3">email</th>
                <th class="col-1">id_avatar</th>
                <th class="col-3">Action</th>
              </tr>    
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr  class="row">
                        <td class="col-1">{{$user->id}}</td>
                        <td class="col-2">{{$user->name}}</td>
                        <td class="col-2">{{$user->age}}</td>
                        <td class="col-3">{{$user->email}}</td>
                        
                        {{-- <td class="col-1">{{$user->id_avatar}}</td> --}}
                        <td class="col-1">
                            @foreach ($avatars as $avatar)
                                @if ($user->id_avatar == $avatar->id)
                                    <img class="img-fluid" src="{{asset('storage/'.$avatar->image)}}" alt="">
                                @endif
                            @endforeach    
                        </td>
                        <td class="col-3">
                            <a href="{{route('editUser',$user->id)}}"><button class="btn btn-warning">edit</button></a>
                            <a href="{{route('deleteUser',$user->id)}}"><button type='submit' class="btn btn-danger">Supprimer</button></a>

                        </td>
                    </tr> 
                @endforeach
            </tbody>
          </table>  

    
@endsection