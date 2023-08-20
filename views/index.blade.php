@extends('layouts.app')
@section('content')
    <div class="container p-4 mx-auto">
        <h1 class="mb-12">Home Page</h1>
        <div class="container">
            <button class="px-4 py-2 bg-gray-800 text-white" hx-get="/posts" hx-trigger="click" hx-target="#posts"
                hx-swap="innerHTML">
                Show Posts
            </button>
            <div id="posts"></div>
        </div>
    </div>
@endsection
