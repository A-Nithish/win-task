@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>State Details</h4>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $state->id }}</p>
        <p><strong>State Name:</strong> {{ $state->state_name }}</p>
        <p><strong>Country:</strong> {{ $state->country->country_name }}</p>

        <hr>
        <h5>Cities in {{ $state->state_name }}</h5>
        @if ($state->cities->count())
            <ul class="list-group">
                @foreach ($state->cities as $city)
                    <li class="list-group-item">
                        {{ $city->city_name }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No cities found.</p>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{ route('states.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
