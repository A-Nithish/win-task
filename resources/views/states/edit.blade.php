@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit State</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('states.update', $state->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="country_id" class="form-label">Country</label>
            <select id="country_id" name="country_id" class="form-control" required>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected' : '' }}>
                        {{ $country->country_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="state_name" class="form-label">State Name</label>
            <input type="text" class="form-control" id="state_name" name="state_name" value="{{ $state->state_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('states.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
