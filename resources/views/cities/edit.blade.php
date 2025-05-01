@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit City</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error) <div>{{ $error }}</div> @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('cities.update', $city) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>City Name</label>
            <input type="text" name="city_name" class="form-control" value="{{ $city->city_name }}" required>
        </div>

        <div class="mb-3">
            <label>State</label>
            <select name="state_id" class="form-control" required>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>
                        {{ $state->state_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('cities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
