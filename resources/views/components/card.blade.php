@props(['edit', 'view'])

<td>

    {{ $slot }}

    <a href="{{ $view }}" class="btn btn-sm btn-primary">View</a>
    <a href="{{ $edit }}" class="btn btn-sm btn-warning">Edit</a>

</td>
