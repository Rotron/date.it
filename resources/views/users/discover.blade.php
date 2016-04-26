@extends('layouts.master')

@section('title', 'Meet some of these folks!')

@section('content')
    <div class="row">
        @foreach($potentials as $potential)
            @if($potential->id != Auth::user()->id)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="/img/users/{{ $potential->picture }}">
                            <span class="card-title">{{ $potential->name }}</span>
                        </div>
                        <div class="card-action">
                            <a href="/users/profile/{{ $potential->id }}">Learn more about this person!</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@stop