<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body>

{{--@include('layouts._top')
@include('layouts._header')--}}

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            @if(Session::has('danger'))
                <div class="alert alert-danger alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                    {!! Session::get('danger') !!}
                </div>
            @endif

            @if(Session::has('warning'))
                <div class="alert alert-warning alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                    {!! Session::get('warning') !!}
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                    {!! Session::get('success') !!}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

{{--@include('layouts._footer')--}}
@stack('scripts')

</body>
</html>
