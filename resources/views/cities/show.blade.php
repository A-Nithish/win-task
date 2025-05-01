@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>City Details</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $city->id }}</p>
            <p><strong>Name:</strong> {{ $city->city_name }}</p>
            <p><strong>State:</strong> {{ $city->state->state_name }}</p>
            <p><strong>Country:</strong> {{ $city->state->country->country_name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
