@extends('layouts.master')

@section('title', 'Add a new Hobby')

@section('content')
    <div class="row"></div>
    <div class="row">
        <form action="/hobbies/save" method="post" enctype="multipart/form-data">
            <div class="col m6 s12 offset-m3 white z-depth-1">
                {{ csrf_field() }}
                <h2>Add a new hobby:</h2>
                <div class="input-field col s12">
                    <input type="text" id="name" name="name">
                    <label for="name">Name of the hobby</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Describe this hobby</label>
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