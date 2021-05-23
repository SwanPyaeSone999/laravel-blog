@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-info">{{session('success')}}</div>
        @endif


        {{ $data->links('pagination::bootstrap-4')}}

        @foreach ($data as $data)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->title }}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $data->created_at->diffForHumans() }}
                    </div>
                    <p class="card-text">{{ $data->body }}</p>
                    <a class="card-link" href="{{ route('article.details', ['id'=>$data->id]) }}">
                        View Detail &raquo;
                    </a>
                </div>
            </div>

        @endforeach



    </div>
@endsection
