@extends('layouts.app')
@section('content')
    <div class="container p-4 mx-auto">
        <h1 class="mb-12">Home Page</h1>
        <div class="container">
            <div hx-get="/posts" hx-trigger="load" hx-target="this" hx-swap="innerHTML" id="posts"></div>
        </div>
    </div>
@endsection
