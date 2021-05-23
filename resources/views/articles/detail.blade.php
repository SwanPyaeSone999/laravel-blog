@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="container">
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                        Category: <b>{{ $article->category->name }}</b>
                    </div>
                    <p class="card-text">{{ $article->body }}</p>
                    <a class="btn btn-danger" href="{{ url("/articles/delete/$article->id") }}">
                        Delete
                    </a>
                    <a class="btn btn-warning" href="{{ url("/articles/edit/$article->id") }}">
                        Edit
                    </a>
                </div>
            </div>

            <ul class="list-group">
                <li class="list-group-item active">
                    <b>Comments ({{ count($article->comments) }})</b>
                </li>
                @foreach ($article->comments as $comment)
                    <li class="list-group-item">
                        {{ $comment->content }}
                        <a href="{{ route('comment.delete', ['id'=>$comment->id]) }}" class="close">
                            &times;
                        </a>
                        <div class="small mt-2">
                            By <b>{{ $comment->user->name }}</b>,
                            {{ $comment->created_at->diffForHumans() }}
                        </div>

                    </li>
                @endforeach
            </ul>


        </div>

        @auth
        <form action="{{ route('comment.add') }}" method="post" class="mt-5">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>
        @endauth

    </div>
@endsection
