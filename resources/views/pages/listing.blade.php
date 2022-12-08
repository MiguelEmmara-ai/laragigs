@extends('layouts.app')

@section('content')
    @include('includes.search')
    <h2>
        {{ $listing->title }}
    </h2>
    <p>
        {{ $listing->description }}
    </p>
@endsection
