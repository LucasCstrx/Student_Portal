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
                <tr>
                    <td>Christian Jay</td>
                    <td>Bachelor of Science in Information Technology</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/1') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>Maria Carissa</td>
                    <td>Bachelor of Secondary Education</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/2') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>Jose Rizal</td>
                    <td>Bachelor of Information Technology</td>
                    <td>4</td>
                    <td>
                        <a href="{{ url('/students/3') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/4/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Juan Tamad</td>
                    <td>Bachelor of Science in Nursing</td>
                    <td>1</td>
                    <td>
                        <a href="{{ url('/students/4') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/5/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>James Castro</td>
                    <td>Bachelor of Science in Medical Laboratories</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/5') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Erleen Ansing</td>
                    <td>Bachelor of Science in Nursing</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/6') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Leo Labis</td>
                    <td>Bachelor of Science in Medical Laboratories</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/7') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Carlito Camajalan</td>
                    <td>Bachelor of Science in Electrical Engineer</td>
                    <td>4</td>
                    <td>
                        <a href="{{ url('/students/8') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/4/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Lance Antipaso</td>
                    <td>Bachelor of Science in Maritime</td>
                    <td>3</td>
                    <td>
                        <a href="{{ url('/students/9') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/3/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Adrian Yu</td>
                    <td>Bachelor of Science in Maritime</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/10') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Keannice Loque</td>
                    <td>Bachelor of Science in Secondary Education</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/11') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
				<tr>
                    <td>Sultan Abdullah</td>
                    <td>Bachelor of Science in Accountancy</td>
                    <td>2</td>
                    <td>
                        <a href="{{ url('/students/12') }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ url('/students/2/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
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
