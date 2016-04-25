@extends('layouts.master')

@section('title', 'Please log in')

@section('content')
    <div class="row">
        <div class="col s12 m6">
            <h1 class="col s12">Log In !</h1>

            <form action="/users/login" method="post">
                {{ csrf_field() }}
                <div class="input-field col s12">
                    <input type="email" name="email" id="email">
                    <label for="email">E-Mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password" id="password">
                    <label for="password">Password</label>
                </div>
                <div class="col s12">
                    <button class="btn waves-light waves-effect" type="submit">Join</button>
                </div>

            </form>
        </div>
        <div class="col s12 m6">

        </div>

    </div>
@stop