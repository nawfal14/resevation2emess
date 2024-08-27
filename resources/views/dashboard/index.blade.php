@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container">
    <h1>Bienvenue, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
</div>

@endsection