@extends('layouts.master')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col s12 m3">
            <h2>Messages</h2>
            <h3>Received</h3>
            @foreach($messages_received as $message)
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h5>{{ $message->topic }}</h5>
                        <p>
                            {{ $message->body }}
                        </p>
                    </div>
                    <div class="card-action">
                        From : <a class="right" href="/users/profile/{{ $message->sender()->id }}">{{ $message->sender()->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
            <h3>Sent</h3>
            @foreach($messages_sent as $message)
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <h5>{{ $message->topic }}</h5>
                            <p>
                                {{ $message->body }}
                            </p>
                        </div>
                        <div class="card-action">
                            To : <a class="right" href="/users/profile/{{ $message->receiver()->id }}">{{ $message->receiver()->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col s12 m3">
            <h2>Dates</h2>
        </div>
        <div class="col s12 m3">
            <h2>About Me</h2>
            <form action="/users/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-field col s12">
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                    <label for="name">Name</label>
                </div>
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="/img/users/{{ $user->picture }}" alt="{{ $user->name }}">
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <label>City</label>
                    <select name="city_id" id="city_id">
                        <option value="" disabled selected>Please choose your city</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" data-icon="/img/cities/{{ $city->picture }}" class="circle" {{ ($city->id == $user->city_id ? 'selected' : '') }}>
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
                <div class="col s12">
                    <label>You are</label>
                    <select name="sex" id="sex">
                        <option value="" disabled selected>You are</option>
                        <option value="m" {{ ($user->sex == 'm' ? 'selected' : '') }}>A guy</option>
                        <option value="f" {{ ($user->sex == 'f' ? 'selected' : '') }}>A girl</option>
                    </select>
                    <label>You are:</label>
                </div>
                <div class="col s12">
                    <label>Looking For</label>
                    <select name="looking_for">
                        <option value="" disabled selected>Looking for</option>
                        <option value="m" {{ ($user->looking_for == 'm' ? 'selected' : '') }}>A guy</option>
                        <option value="f" {{ ($user->looking_for == 'f' ? 'selected' : '') }}>A girl</option>
                        <option value="f" {{ ($user->looking_for == 'b' ? 'selected' : '') }}>Both</option>
                    </select>
                </div>
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">Update</button>
                </div>
            </form>
        </div>
        <div class="col s12 m3">
            <h2>My Hobbies</h2>
            @foreach($user->hobby as $hobby)
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="/img/hobbies/{{ $hobby->picture }}" alt="{{ $hobby->name }}">
                            <span class="card-title">{{ $hobby->name }}</span>
                        </div>
                        <div class="card-action">
                            <a href="/hobbies/removeFromUser/{{ $hobby->id }}">Remove this hobby</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <form action="/hobbies/addToUser" method="POST">
                {{ csrf_field() }}
                <div class="col s12">
                    <select name="hobby_id">
                        <option value="" disabled selected>Add a new hobby!</option>
                        @foreach($hobbies as $hobby)
                            <option value="{{ $hobby->id }}" data-icon="/img/hobbies/{{ $hobby->picture }}" class="circle">{{ $hobby->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
@stop