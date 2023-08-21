@extends('layouts.app')
@section('content')
    <div class="container p-4 mx-auto">
        <div x-data="{ input: '' }" class="space-y-4">
            <h1 class="text-center font-semibold text-2xl">Blog Posts</h1>
            <div class="max-w-lg mx-auto">
                <input hx-post="/search" hx-trigger="keyup changed delay:500ms,search" hx-target="#posts" hx-swap="innerHTML"
                    type="search" class="p-2 border rounded-l w-full shadow " name="search" placeholder="Search Authors" />
            </div>
            <div hx-get="/posts" hx-trigger="load" hx-target="this" hx-swap="innerHTML" id="posts"
                class="max-w-lg mx-auto">
            </div>
        </div>
    </div>
@endsection
