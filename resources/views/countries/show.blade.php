@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Country Details</h4>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $country->id }}</p>
        <p><strong>Name:</strong> {{ $country->country_name }}</p>

        <hr>
        <h5>States in {{ $country->country_name }}</h5>
        @if ($country->states->count())
            <ul class="list-group">
                @foreach ($country->states as $state)
                    <li class="list-group-item">
                        {{ $state->state_name }} 
                        @if ($state->cities->count())
                            <ul>
                                @foreach ($state->cities as $city)
                                    <li>{{ $city->city_name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No states found.</p>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
