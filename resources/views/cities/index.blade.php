@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Cities List</h2>
        <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Add City</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Form -->
    <form method="GET" action="{{ route('cities.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="city_name" class="form-control" placeholder="Search City"
                value="{{ request('city_name') }}">
        </div>
        <div class="col-md-4">
            <select name="state_id" class="form-select">
                <option value="">-- Select State --</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ request('state_id') == $state->id ? 'selected' : '' }}>
                        {{ $state->state_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select name="country_id" class="form-select">
                <option value="">-- Select Country --</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                        {{ $country->country_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ route('cities.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Cities Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>City Name</th>
                <th>State</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->state->state_name }}</td>
                    <td>{{ $city->state->country->country_name }}</td>
                    <td>
                        <a href="{{ route('cities.edit', $city) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cities.destroy', $city) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('cities.show', $city) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cities->links() }}
</div>
@endsection
