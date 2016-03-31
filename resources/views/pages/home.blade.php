@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col s12 m6 grey lighten-2">
        <div class="row">
            <h2 class="white-text center">Latest Leases</h2>
        </div>
        <div class="row">
            @foreach($leases as $lease)
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <div class="card-image">
                                <img src="//placehold.it/350x250">
                                <span class="card-title">{{ $lease->name }}</span>
                            </div>
                            <div class="card-content">
                                <p>{{ $lease->description }}</p>
                            </div>
                            <div class="card-action">
                                <a href="#">Go rent me !</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop