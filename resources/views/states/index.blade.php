@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between mb-3">
    <h2>States</h2>
    <a href="{{ route('states.create') }}" class="btn btn-primary mb-3">Add New State</a>
  </div>  

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>State Name</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($states as $index => $state)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $state->state_name }}</td>
                    <td>{{ $state->country->country_name }}</td>
                    <td>
                        <a href="{{ route('states.edit', $state->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('states.destroy', $state->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            <a href="{{ route('states.show', $state->id) }}" class="btn btn-info btn-sm">View</a>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No states found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
