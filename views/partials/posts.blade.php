@foreach ($posts as $post)
    <div class="border shadow-lg rounded p-4 mt-3 space-y-2">
        <h2 class="text-lg font-semibold text-center">{{ $post->title }}</h2>
        <p class="text-center">{{ $post->body }}</p>
        <p class="text-center italic">Written by: {{ $post->author }}</p>
    </div>
@endforeach
