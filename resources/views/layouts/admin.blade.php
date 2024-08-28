<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- styleSheets -->
    <link rel="stylesheet" href="{{ asset('css/admin/utilities.css') }}">
    {{ $style }}

    <link rel="shortcut icon" href="{{ asset('img/b.png') }}" />
    <title>Bill E-Shop</title>

    <!-- scripts -->
    <script src="{{ asset('js/admin/utilities.js') }}" defer></script>
    {{ $js ?? '' }}

    {{ $chart ?? '' }}

    <style>
    a[href="{{ url()->current() }}"] {
        color: var(--text-blue);
    }

    .dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    .nav_admin {
        position: relative;
    }

    .dropdown-toggle {
        cursor: pointer;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        min-width: 150px;
        border-radius: 5px;
    }

    .dropdown-menu .dropdown-item {
        padding: 10px;
        color: #333;
        text-align: center;
        text-decoration: none;
        display: block;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    .nav_admin:hover .dropdown-menu {
        display: block;
    }
    </style>
</head>

<body class="m-0">
    <div class="cover"></div>
    <nav>
        <span class="ham material-icons">menu</span>
        <a id="nav_logo" class="d-b" href="#"><img class="fit_img" src="{{ asset('img/b.png') }}" alt="logo"></a>
        <!--<button id="theme-toggle">Toggle Dark Mode</button> -->
        <div class="nav_admin dropdown">
            <img class="fit_img admin_img dropdown-toggle" src="{{ asset('img/profile.jpg') }}" alt="admin_img"
                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <h6 class="dropdown-item">{{ auth()->user()->full_name }}</h6>
                <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                    @csrf
                    <input class="logout" type="submit" value="Logout">
                </form>
            </div>
        </div>
    </nav>


    <aside>
        <div id="aside_logo">
            <a class="d-b" href="#"><img class="fit_img" src="{{ asset('img/b.png') }}" alt="logo"></a>
        </div>
        <div id="aside_admin">
            <div class="card flex_align">
                <img class="fit_img admin_img d-b" src="{{ asset('img/b.png') }}" alt="admin_img">
                <!--<div>
                    <h6>{{ auth()->user()->full_name }}</h6>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class="logout" type="submit" value="Logout">
                    </form>
                </div> -->
                <h1 style="color:#ffffff">Admin Dashboard</h1>
            </div>
        </div>
        <div class="aside_main">
            <ul>
                <li>GENERAL</li>
                <ul>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.dashboard') }}">
                            <span class="material-icons">dashboard</span>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.transactions.index') }}">
                            <span class="material-icons">paid</span>
                            <div>Transactions</div>
                        </a>
                    </li>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.account') }}">
                            <span class="material-icons">person</span>
                            <div>Account</div>
                        </a>
                    </li>
                </ul>
            </ul>
            <ul style="margin: 1.5rem 0;">
                <li>MANAGEMENT</li>
                <ul style="margin-bottom: 5rem">
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.customers') }}">
                            <span class="material-icons">people</span>
                            <div>Customers</div>
                        </a>
                    </li>
                    <li class="list_item has-sub">
                        <a class="flex_align" href="#">
                            <span class="material-icons">shopping_bag</span>
                            <div>Products</div>
                            <span class="arrow material-icons">arrow_drop_down</span>
                        </a>
                        <div class="products sub">
                            <a href="{{ route('admin.products.index') }}">List</a>
                            <a href="{{ route('admin.products.create') }}">Create</a>
                        </div>
                    </li>
                    <li class="list_item has-sub">
                        <a class="flex_align" href="#">
                            <span class="material-icons">category</span>
                            <div>Categories</div>
                            <span class="arrow material-icons">arrow_drop_down</span>
                        </a>
                        <div class="categories sub">
                            <a href="{{ route('admin.categories.index') }}">List</a>
                            <a href="{{ route('admin.categories.create') }}">Create</a>
                        </div>
                    </li>
                    <li class="list_item">
                        <a class="flex_align" href="{{ route('admin.orders.index') }}">
                            <span class="material-icons">shopping_cart</span>
                            <div>Orders</div>
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </aside>
    <main>
        {{-- main contents --}}
        {{ $slot }}
        {{-- main contents --}}
    </main>
</body>

</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';

    console.log("Current theme:", currentTheme);

    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        console.log("Dark mode applied on load.");
    }

    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        let theme = 'light';
        if (document.body.classList.contains('dark-mode')) {
            theme = 'dark';
        }
        console.log("Theme changed to:", theme);
        localStorage.setItem('theme', theme);
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.getElementById('dropdownMenuButton');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show');
    });

    document.addEventListener('click', function(e) {
        if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});
</script>