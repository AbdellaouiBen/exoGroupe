@extends('layout.master')

@section('content')
    @include('components.nav')

    <div class="my-5">
        <a class="btn btn-success" href="{{route('arrUser')}}">Users</a>
        <a  class="btn btn-success" href="{{route('arrAvatar')}}">Avatars</a>
        <a  class="btn btn-success" href="{{route('arrCategorie')}}">Categories</a>
        <a  class="btn btn-success" href="{{route('arrImage')}}">Images</a>
    </div>


    
@endsection