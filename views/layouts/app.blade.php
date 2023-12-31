<!DOCTYPE html>
<html lang="en">

<head>
    <title>My App</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <script src="https://unpkg.com/htmx.org@1.9.4"
        integrity="sha384-zUfuhFKKZCbHTY6aRR46gxiqszMk5tcHjsVFxnUo8VMus4kHGVdIYVbOYYNlKmHV" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    @include('partials.nav')
    @yield('content')
</body>

</html>
