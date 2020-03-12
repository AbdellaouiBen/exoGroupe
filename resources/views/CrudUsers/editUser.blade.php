@extends('layout.master')

@section('content')
    @include('components.nav')
    <h1 class="mt-5 text-center bg-danger text-white ">edit User</h1>

    <form action="{{route('updateUser',$users->id)}}" method="POST" >
        @csrf
    <div class="text-center form-group container">    

        <div class="form-group">
            <label class="d-block input-group-text" for="name">name</label>
            <input class="form-control" type="text" name='name' value="{{old('name',$users->name)}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>           
        <div class="form-group">
            <label class="d-block input-group-text" for="age">age</label>
            <input class="form-control @error('age') is-invalid @enderror" type="text" name='age' value="{{old('age',$users->age)}}">
            @error('age')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>           
        <div class="form-group">
            <label class="d-block input-group-text" for="email">email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name='email' value="{{$users->email}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>           
           
        <div class="form-group">
            <label class="d-block input-group-text" for="titre">id_avatar</label>

            <select class="form-control" name="id_avatar" id="">
                @foreach ($avatars as $avatar)
                    @if ($avatar->id===$users->id_avatar)
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