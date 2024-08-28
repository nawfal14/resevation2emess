@extends('layouts.app')

@section('title', 'Reservations')

@section('content')
<h1>Admin Dashboard</h1>
<p>Bienvenue: {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>

@endsection