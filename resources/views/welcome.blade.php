@extends('layouts.app')

@section('title', 'หน้าแรกของเว็บไซต์')

@section('content')
    <h2>บทความทั้งหมด</h2>
   <hr>
   @foreach ($blogs as $item)
       <h2>{{$item->title}}</h2>
       <p>{!!Str::limit($item->content,30)!!}</p>
       <br>
       <a href="/detail/{{$item->id}}">อ่านเพิ่มเติม</a>
       <hr>
   @endforeach
@endsection
