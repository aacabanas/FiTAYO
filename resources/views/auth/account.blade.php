@extends('base')

@section("title","Account of ".auth()->user()->username)

@section('content')
    {{$userID}}
@endsection