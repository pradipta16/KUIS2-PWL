@extends('layouts.Master')

@section('title', 'Manage-User')
    
@section('content')

<div class="container" style="padding-top: 90px">
    <div class="textCake" style="padding-top: 10px">
        <h3>EDIT TABEL</h3>
      </div>
    <form action="/manageUser/update/{{$user->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$user->id}}"><br>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" required="required" name="name" value="{{$user->name}}"><br>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"  class="form-control" required="required" name="email" style="height:90px;" value="{{$user->email}}"></br>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" required="required" name="password" value="{{$user->password}}"></br>
        </div>
        <div class="form-group">
            <label for="roles">Roles</label>
            <input type="text" class="form-control" required="required" name="roles" value="{{$user->roles}}"></br>
        </div>
        <div class="form-group">
            <label for="image">Feature Image</label>
            <input type="file" class="form-control" required="required" name="image" value="{{$user->image}}"></br>
        </div> 
        <img height="120px" src="{{asset('/storage/'.$user->image)}}">
        <button type="submit" name="edit" class="btn btn-dark float-right">Ubah Data</button>
    </form>
</div>
@endsection