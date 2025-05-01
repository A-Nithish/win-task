@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Countries</h2>
        <a href="{{ route('countries.create') }}" class="btn btn-primary">Add Country</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Country Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($countries as $index => $country)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td>
                        <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info btn-sm">View</a>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">No countries found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
