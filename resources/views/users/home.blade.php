@extends('layouts.master')

@section('title', $user->name)

@section('content')
    <h1>{{ $user->name }}</h1>
@stop