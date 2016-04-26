@extends('layouts.master')

@section('title', 'Offer a date')

@section('content')
    <div class="row"></div>
    <div class="row">
        <form action="/dates/save" method="POST">
            <div class="col s12 m6 offset-m3 white z-depth-1">
                <h3>Offer a date</h3>
                {{ csrf_field() }}
                <input type="hidden" name="proposed_to" value="{{ $user->id }}">
                <div class="input-field col s12">
                    <input type="text" value="{{ $user->name }}" disabled id="proposed_to">
                    <label for="proposed_to">Proposed to</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" value="{{ Auth::user()->name }}" disabled id="proposed_by">
                    <label for="proposed_by">Proposed by</label>
                </div>
                <div class="col s12">
                    <input type="date" name="date" id="ui-datepicker" >
                </div>
                <input type="hidden" id="date-lat" name="date-lat">
                <input type="hidden" id="date-lon" name="date-lon">
                <div class="col s12" id="date-map" style="height : 300px;"></div>
                <div class="input-field col s12">
                    <textarea name="description" id="description" class="materialize-textarea"></textarea>
                    <label for="description">Why do you propose this date?</label>
                </div>
                <div class="col s12">
                    <button type="submit"  class="btn waves-effect waves-light">Date!</button>
                </div>
                <div class="row"></div>
            </div>
        </form>
    </div>

@stop

@section('scripts')
    <?php
    $loc = explode(',', Auth::user()->city->location);
    ?>
    $('#date-map').locationpicker({
    location: {latitude: {{ $loc[0] }}, longitude: {{ $loc[1] }}},
    radius: 300,
    inputBinding: {
    latitudeInput: $('#date-lat'),
    longitudeInput: $('#date-lon')
    }
    });
@stop