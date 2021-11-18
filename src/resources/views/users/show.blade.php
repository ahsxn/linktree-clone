<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body style="background-color: {{ $user->background_colour }}" class="font-sans antialiased">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center p-12 space-y-4">
            @foreach ($user->links as $link)
            <a  onclick='reportClick("{{ $link->id }}", "{{ $link->link }}")'
                href="{{ $link->link }}"
                class="w-1/2 p-4 font-bold text-center uppercase border border-black user-link "
                style="color: {{ $user->text_colour }}"
                target="_blank"
            > {{ $link->name }}
            </a>
            @endforeach
        </div>
    </div>
    <script>
        function reportClick(id, link) {
            axios.post(`/visits/${id}`, {
                link: link
            })
        }
    </script>
</body>
</html>