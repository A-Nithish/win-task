@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Location Search</h2>
    <!-- Your dropdowns or inputs can come here -->

    <div id="result"></div>
</div>
@endsection

@section('scripts')
<script>
    // Search countries
    $.get('/countries?search=Ind', function(data) {
        console.log(data); // array of matching countries
        $('#result').append('<h4>Countries:</h4><pre>' + JSON.stringify(data, null, 2) + '</pre>');
    });

    // Get states of India (country_id = 1)
    $.get('/states?country_id=1', function(data) {
        console.log(data);
        $('#result').append('<h4>States:</h4><pre>' + JSON.stringify(data, null, 2) + '</pre>');
    });

    // Search cities in Tamil Nadu (state_id = 10)
    $.get('/cities?state_id=10&search=che', function(data) {
        console.log(data);
        $('#result').append('<h4>Cities:</h4><pre>' + JSON.stringify(data, null, 2) + '</pre>');
    });

    // Search countries
$.get('/countries?search=Ind', function(data) {
    console.log(data); // array of matching countries
});

// Get states of India (country_id = 1)
$.get('/states?country_id=1', function(data) {
    console.log(data);
});

// Search cities in Tamil Nadu (state_id = 10)
$.get('/cities?state_id=10&search=che', function(data) {
    console.log(data);
});

</script>
@endsection
