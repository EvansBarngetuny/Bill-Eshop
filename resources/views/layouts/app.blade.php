<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
    {{ $style }}


    <link rel="shortcut icon" href="{{ asset('img/b.png') }}" />
    <title>Bill | E-Shop</title>

    <script src="{{ asset('js/utilities.js') }}" defer></script>
    {{ $js ?? '' }}
    <style>
    .flex-row {
        display: flex;
        align-items: center;
        gap: 10px;
        /* Adjust the gap between elements as needed */
    }

    .site-info p {
        margin: 0;
    }
    </style>
</head>

<body class="m-0">

    @include('components.header')

    {{-- main contents --}}
    {{ $slot }}
    {{-- main contents --}}
    <footer>
        <div class="footer-links _container flex_align">
            @each('components.temp', range(1, 4), 'link')
        </div>
        <div class="ham site-info flex-row">
            <!--<a class="logo-link d-b" href="#"><img class="d-b" src="{{ asset('img/b.png') }}" alt="logo"></a> -->
            <a id="nav_logo" class="d-b" href="#"><img class="fit_img" style="width: 40px; height:auto"
                    src="{{ asset('img/b.png') }}" alt="logo"></a>
            <p>&copy - {{now()->year}}</p>
        </div>
    </footer>
</body>

</html>