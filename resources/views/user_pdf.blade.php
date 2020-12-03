<!DOCTYPE html>
<html>
<head>
<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
<style type="text/css">
table tr td,
table tr th{
font-size: 9pt;
}
</style>
<center>
<h5>Laporan Artikel</h4>
</center>
<table class='table table-bordered'>
<thead>
<tr>
<th>ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Email</th>
    <th>Roles</th> 
</tr>
</thead>
<tbody>
@php $i=1 @endphp
@foreach($user as $a)
<tr>
<td>{{$a->id}}</td>
<td>{{$a->name}}</td>
<td><img width="50px" src="{{public_path('storage/'.$a->image)}}"></td>
<td>{{$a->email}}</td>
<td>{{$a->roles}}</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>
