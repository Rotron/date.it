@extends('layouts.master')

@section('title', 'Cities')

@section('content')
    <h1>Cities</h1>

    @foreach($cities as $city)
        <h2>{{ $city->name }}</h2>
        @foreach($city->leases as $lease)
            <h3>{{ $lease->name }}</h3>
        @endforeach
    @endforeach
@stop