<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ Панель - KyrgyzTour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <div class="h-16 flex items-center justify-center border-b border-gray-800">
                <span class="text-xl font-bold">KyrgyzTour Admin</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-blue-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Главная
                </a>

                <a href="{{ route('admin.directions.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.directions.*') ? 'bg-gray-800 text-blue-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Багыттар
                </a>

                <a href="{{ route('admin.tours.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.tours.*') ? 'bg-gray-800 text-blue-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Турлар
                </a>
            </nav>
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Выйти
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6">
                <h2 class="text-xl font-semibold text-gray-800">@yield('header')</h2>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">{{ Auth::user()->name }}</span>
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
