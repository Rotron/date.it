@extends('layouts.master')

@section('title')
    {{ $user->name }}
@stop

@section('content')
    <?php
        if($user->sex == 'f'){
            $sex = 'Girl';
        }
        else {
            $sex = 'Guy';
        }

            if($user->looking_for  == 'f'){
                $looking_for = 'Girls';
            }
            else if($user->looking_for == 'm'){
                $looking_for = 'Guys';
            }
            else {
                $looking_for = 'Guys & Girls';
            }
    ?>
    <div class="row">
        <div class="col s12 m8">
            <h2>{{ $user->name }} is a {{ $sex }} looking for {{ $looking_for }} </h2>
            <div class="col s12">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/users/{{ $user->picture }}" alt="{{ $user->name }}">
                        <span class="card-title">{{ $user->name }}</span>
                    </div>
                    <div class="card-action">
                        <a class="modal-trigger" href="#message-modal">Send a message</a>
                        <a href="/dates/create/{{ $user->id }}">Offer a date</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col c12 m4">
            <h2>Hobbies</h2>
            @foreach($user->hobby as $hobby)
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="/img/hobbies/{{ $hobby->picture }}" alt="{{ $hobby->name }}">
                            <span class="card-title">{{ $hobby->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="message-modal" class="modal">
        <form action="/messages/send" method="POST">
            <div class="modal-content">
                <h3>Send a message</h3>
                {{ csrf_field() }}
                <input type="hidden" name="to" value="{{ $user->id }}">
                <div class="input-field col s12">
                    <input type="text" disabled id="to" value="{{ $user->name }}">
                    <label for="to">To</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" disabled id="from" value="{{ Auth::user()->name }}">
                    <label for="from">From</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="topic" id="topic">
                    <label for="topic">Topic</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="body" name="body" class="materialize-textarea"></textarea>
                    <label for="body">What would you like to say?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn modal-action modal-close waves-effect waves-light">Send</button>
            </div>
        </form>
    </div>
@stop