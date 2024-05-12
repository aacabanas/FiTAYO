@extends('base')

@section("title","Account of ".$data->editUsername)

@section('content')

   @foreach ($data as $k=>$v )
       <div class="row">
        <div class="col-6 border border-black">{{$k}}</div>
        <div class="col-6 border border-primary">{{$v}}</div>
       </div>
   @endforeach

    
@endsection