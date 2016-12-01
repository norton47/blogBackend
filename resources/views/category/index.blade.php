@extends('vendor.adminlte.layouts.app')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                @forelse($categories as $category)
                    <ul>
                        <li><a href="{{ route('category.show', [$category->id]) }}">{{ $category->name }}</a></li>
                        <li>{{ $category->description }}</li>
                    </ul>
                @empty
                    <div></div>
                @endforelse
            </div>
        </div>

    </div>
@stop
