@extends('layouts.master')

@section('title', 'Update the city')

@section('content')
    <div class="row"></div>
    <div class="row">
        <form action="/cities/update" method="post" enctype="multipart/form-data">
            <div class="col m6 s12 offset-m3 white z-depth-1">
                {{ csrf_field() }}
                <h2>Update:</h2>
                <input type="hidden" name="id" value="{{ $city->id }}">
                <div class="input-field col s12">
                    <input type="text" id="name" name="name" value="{{ $city->name }}">
                    <label for="name">Name of the city</label>
                </div>
                <div class="col s12" id="map-picker" style="height : 500px;"></div>
                <input type="hidden" id="city-lat" name="city-lat">
                <input type="hidden" id="city-lon" name="city-lon">
                <div class="row"></div>
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea">{{ $city->description }}</textarea>
                    <label for="description">Describe the city</label>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn">
                            <span>
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        <input type="file" name="picture">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="col s12">
                    <button class="btn waves-light waves-effect center" type="submit">Submit</button>
                </div>
                <div class="row"></div>
            </div>
        </form>
    </div>
@stop

@section('script')
    <?php
        $loc = explode(',', $city->location);
    ?>
    $('#map-picker').locationpicker({
    location: {latitude: {{ $loc[0] }}, longitude: {{ $loc[1] }}},
    radius: 1000,
    inputBinding: {
    latitudeInput: $('#city-lat'),
    longitudeInput: $('#city-lon')
    }
    });
@stop