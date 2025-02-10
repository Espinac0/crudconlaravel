<header class="md:h-15v bg-header flex flex-col md:flex-row justify-between px-3 items-center">
    <!-- Logo -->
    <img class="w-1/3 md:w-1/12 max-h-full p-5" src="{{ asset('images/logo.png') }}" alt="logo">

    <!-- Título (visible solo en escritorio) -->
    <h1 class="hidden md:block text-7xl">Gestión de instituto</h1>

    <!-- Menú para escritorio -->
    <div class="hidden md:flex items-center space-x-4">
        @auth
            <span>{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-glass">Logout</button>
            </form>
        @endauth
        @guest
            <a class="btn btn-glass" href="{{ route('login') }}">Login</a>
            <a class="btn btn-glass" href="{{ route('register') }}">Register</a>
        @endguest
    </div>

    <!-- Menú hamburguesa para móvil -->
    <div class="md:hidden">
        <button id="menu-btn" class="text-white text-3xl focus:outline-none">&#9776;</button>
        <div id="menu" class="hidden absolute right-5 top-16 bg-gray-800 p-5 rounded-lg shadow-lg">
            @guest
                <a class="block text-white mb-2" href="{{ route('login') }}">Login</a>
                <a class="block text-white" href="{{ route('register') }}">Register</a>
            @endguest
        </div>
    </div>
</header>

<script>
    document.getElementById("menu-btn").addEventListener("click", function() {
        document.getElementById("menu").classList.toggle("hidden");
    });
</script>
