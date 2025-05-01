@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Country</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('countries.update', $country->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="country_name" class="form-label">Country Name</label>
            <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $country->country_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
