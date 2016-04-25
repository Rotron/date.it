@extends('layouts.master')

@section('title', 'Administration Panel')

@section('content')
    <div class="row">
        <h2>Latest Users</h2>
        @foreach($users as $user)
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/users/{{ $user->picture }}">
                        <span class="card-title">{{ $user->name }}</span>
                    </div>
                    <div class="card-action">
                        <a href="#">Check IT</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col s12 m6">
            <h2>Stats</h2>
        </div>
        <div class="col s12 m6">
            <h2>Cities</h2>
            <div class="row">
                @foreach($cities as $city)
                    <div class="col m6 s12">
                        <div class="card">
                            <div class="card-image">
                                <img src="/img/cities/{{ $city->picture }}.jpg">
                                <span class="card-title">{{ $city->name }}</span>
                            </div>
                            <div class="card-content">
                                <p>{{ $city->description }}</p>
                            </div>
                            <div class="card-action">
                                <a href="/cities/modify/{{ $city->id }}">Modify</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="btn-floating btn-large waves-effect waves-light red" href="/cities/create">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
@stop