@extends('layout')

@section('content')
    <div class="py-5 text-center">
        <h1>Welcome to the Student Portal</h1>
        <p class="lead">A simple system to manage student records — view, add, and maintain student information.</p>
        <p class="mt-4">
            <a href="{{ url('/students') }}" class="btn btn-primary btn-lg">View Students</a>
        </p>
    </div>
@endsection