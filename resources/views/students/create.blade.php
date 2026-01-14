@extends('components.layout')

@section('content')
    <div class="container py-5">
        <h2>Add New Student</h2>

        <form method="POST" action="{{ url('/students') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <input name="course" class="form-control" value="{{ old('course') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Year Level</label>
                <input name="year" class="form-control" value="{{ old('year') }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Add Student</button>
                <a href="{{ url('/students') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
