@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="parallax-container">
        <div class="parallax">
            <img src="/img/home1.jpg">
        </div>
    </div>
    <div class="section white">
        <h2 class="header">Looking for love?</h2>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="/img/home2.jpg">
        </div>
    </div>
    <div class="section white">
        <div class="col s12 m4"><h3>This</h3></div>
        <div class="col s12 m4"><h3>That</h3></div>
        <div class="col s12 m4"><h3>Thus</h3></div>
    </div>
</div>
@stop