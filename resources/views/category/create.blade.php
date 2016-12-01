@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title', trans('category.categories'))
@section('main-content')
    {{ Form::open(['route' => ['category.store']]) }}
    @include('category._form')
    {{ Form::close() }}
@stop
