@extends('layouts.app')
@section('content')
    <div class="container">

        <form method="post">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Add Article" class="btn btn-primary">
        </form>
    </div>
@endsection
