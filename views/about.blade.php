@extends('layouts.app')
@section('content')
    <div class="container p-4 mx-auto">
        <h1>About</h1>

        <form action="/test" method="POST">
            <h1 class="font-bold text-gray-800 text-center text-2xl">Some Form</h1>
            <div class="mx-auto my-6 flex flex-col space-y-3 max-w-lg">
                <input type="text" class="border rounded p-2" name="name" placeholder="Name" />
                <input type="text" class="border rounded p-2" name="email" placeholder="Email" />
                <button type="submit" class="bg-gray-800 rounded font-semibold text-white px-4 py-2">Submit</button>
            </div>
        </form>
    </div>
@endsection
