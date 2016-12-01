@extends('vendor.adminlte.layouts.app')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                @forelse($posts as $post)
                    <ul>
                        <li><a href="{{ route('category.show', [$post->id]) }}">{{ $post->name }}</a></li>
                        <li>{{ $post->description }}</li>
                    </ul>
                @empty
                    <div></div>
                @endforelse
            </div>
        </div>

    </div>
@stop