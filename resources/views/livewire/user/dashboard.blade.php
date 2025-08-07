@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to your dashboard, {{ Auth::user()->name }}</h1>
    </div>
@endsection