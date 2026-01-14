@extends('components.layout')

@section('content')
    <div class="container py-5">
        <h2>Edit Student</h2>

        <form method="POST" action="{{ url('/students/' . ($student['id'] ?? (request()->route('id') ?? ''))) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" value="{{ old('name', $student['name'] ?? ($student->name ?? '')) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" class="form-control"
                    value="{{ old('email', $student['email'] ?? ($student->email ?? '')) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <input name="course" class="form-control"
                    value="{{ old('course', $student['course'] ?? ($student->course ?? '')) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Year Level</label>
                <input name="year" class="form-control"
                    value="{{ old('year', $student['year'] ?? ($student->year ?? '')) }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/students') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
