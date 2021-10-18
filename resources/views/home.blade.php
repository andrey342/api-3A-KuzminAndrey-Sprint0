@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')

    @foreach($res as $item)
    <p><li> Lectura: <strong>{{ $item->get("lectura") }}</strong>, LatX: <strong>{{ serialize($item->get("latX")) }} </strong>
            , LatY :<strong>{{ serialize($item->get("latY")) }} </strong>
            </li></p>
    @endforeach

@endsection
