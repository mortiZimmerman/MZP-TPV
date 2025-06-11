@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tables</h1>
    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">New Table</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Client Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
            <tr>
                <td>{{ $table->number }}</td>
                <td>{{ ucfirst($table->status) }}</td>
                <td>
                    <a href="{{ route('tables.show', $table) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('tables.edit', $table) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('tables.destroy', $table) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
