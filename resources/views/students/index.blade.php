@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Student List</h2>
            <a href="{{ url('/students/create') }}" class="btn btn-success">Add New Student</a>
        </div>

        <div class="mb-3">
            <input id="studentSearch" type="search" class="form-control" placeholder="Search students by name, course, or year...">
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($samples as $sample)
                <tr>
                    <td>{{ $sample['name'] }}</td>
                    <td>{{ $sample['course'] }}</td>
                    <td>{{ $sample['year'] }}</td>
                    <td>
                        <a href="{{ url('/students/1') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="noResults" class="alert alert-warning" style="display:none">No matching students found.</div>

        <script>
            (function() {
                const input = document.getElementById('studentSearch');
                const table = document.querySelector('table.table tbody');
                const rows = Array.from(table.querySelectorAll('tr'));
                const noResults = document.getElementById('noResults');

                function normalize(s){ return (s||'').toString().toLowerCase().trim(); }

                function filter() {
                    const q = normalize(input.value);
                    let visible = 0;
                    rows.forEach(r => {
                        const text = normalize(r.innerText);
                        if (!q || text.indexOf(q) !== -1) {
                            r.style.display = '';
                            visible++;
                        } else {
                            r.style.display = 'none';
                        }
                    });
                    noResults.style.display = visible ? 'none' : '';
                }

                input.addEventListener('input', filter);
                // optional: allow clearing with Escape
                input.addEventListener('keydown', function(e){ if(e.key === 'Escape'){ input.value=''; filter(); }});
            })();
        </script>

        <a href="{{ url('/') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
