@extends('layouts.app')

@section('title', 'Reservations')

@section('content')
<h1>Bienvenue, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!</h1>
<!-- Your content here -->

@endsection

