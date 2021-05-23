@extends('layouts.app')
@section('content')
    <div class="container">

        <form method="post">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required value="{{$edit->title ?? old('title')}}">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control" required >{{$edit->body ?? old('body')}}</textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    <option value="1">News</option>
                    <option value="2">Tech</option>
                </select>
            </div>
            <input type="submit" value="Add Article" class="btn btn-primary">
        </form>
    </div>
@endsection
