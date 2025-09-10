<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GadgetHub — Home</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-900">
    <!-- Header / Nav -->
    <header class="border-b bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 font-semibold tracking-tight">
                    <span class="text-xl">🛒 GadgetHub</span>
                </a>
                <nav class="flex items-center gap-6 text-sm font-medium">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900">Home</a>
                    <a href="{{ url('/products') }}" class="text-gray-600 hover:text-gray-900">Products</a>
                    <a href="{{ url('/blog') }}" class="text-gray-600 hover:text-gray-900">Blog</a>

                    {{-- Auth section --}}
                    @auth
                        <div class="relative">
                            <!-- Profile button -->
                            <button id="profileBtn"
                                class="flex items-center gap-2 rounded-full border px-3 py-1.5 text-sm hover:bg-gray-100">
                                <span class="h-6 w-6 rounded-full bg-gray-200 grid place-items-center">👤</span>
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            <!-- Dropdown -->
                            <!-- Dropdown -->
                            <div id="profileMenu"
                                class="absolute right-0 mt-2 w-40 rounded-lg border bg-white shadow-md hidden z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                        @endauth
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero -->
    @yield('content')

    <!-- Values -->
    @yield('valvue')

    <!-- Footer -->
    @yield('footer')

    <script>
        // Simple dropdown toggle
        document.addEventListener("DOMContentLoaded", () => {
            const btn = document.getElementById("profileBtn");
            const menu = document.getElementById("profileMenu");

            if (btn) {
                btn.addEventListener("click", () => {
                    menu.classList.toggle("hidden");
                });
            }
        });
    </script>
</body>

</html>
