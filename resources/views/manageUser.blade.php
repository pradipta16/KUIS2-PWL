@extends('layouts.master')

@section('content')

<div class="container">
    <table class="table table-bordered table-striped " style="margin-top:80px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Email</th>
                <th>Roles</th> 
                <th></th>
            </tr>
        </thead>
<tbody>
@foreach($user as $a)
<tr>
<td>{{$a->id}}</td>
<td>{{$a->name}}</td>
<td><img height="80px" src="{{asset('/storage/'.$a->image)}}"></td>
<td>{{$a->email}}</td>
<td>{{$a->roles}}</td>
<td><a href="manageUser/editUser/{{ $a->id }}" class="badge badge-warning">Edit</a>
<a href="manageUser/delete/{{ $a->id }}" class="badge badge-danger">Hapus</a>
</td>


</tr>
@endforeach
</tbody>
</table>
<a href="/manageUser/addUser" class="btn btn-primary">Tambah Data</a>
<a href="/manageUser/cetak_pdf" class="btn btn-primary"target="_blank">CETAK PDF</a>

</div>

@endsection