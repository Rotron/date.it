@extends('layouts.master')

@section('title', 'Sign In')

@section('content')
    <div class="row"></div>
    <div class="row">
        <div class="col s12 m6 offset-m3 white z-depth-1">
            <h2 class="col s12">Sign In !</h2>
            <p class="grey-text">
                Signin up helps us out to find the perfect match for you.
            </p>
            <form action="/users/save" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-field col s12">
                    <input type="text" name="name" id="name">
                    <label for="name">Username</label>
                </div>

                <div class="input-field col s12">
                    <input type="password" name="password" id="password">
                    <label for="password">Password</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" name="email" id="email">
                    <label for="email">E-Mail</label>
                </div>
                <div class="input-field col s12">
                    <select name="city_id" id="city_id">
                        <option value="" disabled selected>Please choose your city</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" data-icon="/img/cities/{{ $city->picture }}.jpg" class="circle">
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
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
                <div class="input-field col s6">
                    <select name="sex">
                        <option value="" disabled selected>Please choose an option</option>
                        <option value="m">A guy</option>
                        <option value="f">A girl</option>
                    </select>
                    <label>You are:</label>
                </div>
                <div class="input-field col s6">
                    <select name="looking_for">
                        <option value="" disabled selected>Please choose an option</option>
                        <option value="m">A guy</option>
                        <option value="f">A girl</option>
                        <option value="b">Both</option>
                    </select>
                    <label>Looking for:</label>
                </div>
                <div class="col s12">
                    <button class="btn waves-light waves-effect center" type="submit">Join</button>
                </div>
                <div class="row"></div>
            </form>
        </div>
    </div>
@stop
