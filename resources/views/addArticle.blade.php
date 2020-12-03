@extends('layouts.master')

@section('content')
<link href="css/clean-blog.min.css" rel="stylesheet">
    <div class="container">
        <form action="/addArticle/create" method="post" enctype="multipart/form-data" style="margin-top:70px;">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" required="required" name="title"></br>
        </div>
        <div class="form-group">
            <label for="content">Excerpt</label>
            <input type="text" class="form-control" required="required" name="excerpt"></br>
            </div>
        <div class="form-group">
            <label for="image">Content</label>
            <input type="text" class="form-control" required="required" name="body"></br>
        </div>
        <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>
        <div class="form-group">
            <label for="image">Feature Image</label>
            <input type="file" class="form-control" required="required" name="image"></br>
        </div>
        </form>
    </div>
@endsection