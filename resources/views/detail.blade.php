@extends('layouts.app')

@section('title')
{{$blog->title}}
@endsection
@section('content')
    <h2>{{$blog->title}}</h2>
    <p class="container">
        {!!$blog->content!!}
    </p>
@endsection
