<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', \App\Models\Setting::get('site_name', 'KyrgyzTour'))</title>
    <meta name="description" content="@yield('description', 'Авторские туры по Кыргызстану')">

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Montserrat', sans-serif; }
        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute; width: 0; height: 2px; bottom: -4px; left: 0;
            background-color: #2563EB; transition: width 0.3s;
        }
        .nav-link:hover::after { width: 100%; }

        /* Скроллбар */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- ===== Меню (Header) ===== -->
    <header id="main-header" class="fixed w-full top-0 z-50 bg-white shadow-sm text-gray-900">
        <div class="container mx-auto px-6 py-4">
            <nav class="flex justify-between items-center">
                <!-- Логотип -->
                <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-wider flex items-center gap-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ \App\Models\Setting::get('site_name', 'KyrgyzTour') }}</span>
                </a>

                <!-- Десктоп меню -->
                <div class="hidden md:flex space-x-8 items-center font-medium text-gray-600">
                    <a href="{{ route('home') }}" class="nav-link hover:text-blue-600 transition {{ Route::is('home') ? 'text-blue-600' : '' }}">Главная</a>
                    <a href="{{ route('directions.index') }}" class="nav-link hover:text-blue-600 transition {{ Route::is('directions.*') ? 'text-blue-600' : '' }}">Направления</a>
                    <a href="{{ route('tours.index') }}" class="nav-link hover:text-blue-600 transition {{ Route::is('tours.*') ? 'text-blue-600' : '' }}">Туры</a>
                    <a href="{{ route('page.show', 'about') }}" class="nav-link hover:text-blue-600 transition {{ request()->is('*/page/about') ? 'text-blue-600' : '' }}">О нас</a>
                    <a href="{{ route('reviews.index') }}" class="nav-link hover:text-blue-600 transition {{ Route::is('reviews.*') ? 'text-blue-600' : '' }}">Отзывы</a>
                    <a href="{{ route('page.show', 'contacts') }}" class="nav-link hover:text-blue-600 transition {{ request()->is('*/page/contacts') ? 'text-blue-600' : '' }}">Контакты</a>
                </div>

                <!-- Тил жана Кнопка -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Тил которгуч -->
                    <div class="flex space-x-2 text-sm font-bold text-gray-600">
                        <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'ru'])) }}" class="{{ app()->getLocale() == 'ru' ? 'text-blue-600' : 'hover:text-blue-500' }}">RU</a>
                        <span>|</span>
                        <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'en'])) }}" class="{{ app()->getLocale() == 'en' ? 'text-blue-600' : 'hover:text-blue-500' }}">EN</a>
                    </div>
                </div>

                <!-- Мобильное меню кнопка -->
                <button id="mobile-menu-button" class="md:hidden focus:outline-none text-gray-900">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </nav>
        </div>

        <!-- Мобильное меню (выпадающее) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white text-gray-800 absolute w-full shadow-xl border-t">
            <div class="px-6 py-4 space-y-3 flex flex-col font-medium">
                <a href="{{ route('home') }}" class="block py-2 hover:text-blue-600">Главная</a>
                <a href="{{ route('directions.index') }}" class="block py-2 hover:text-blue-600">Направления</a>
                <a href="{{ route('tours.index') }}" class="block py-2 hover:text-blue-600">Туры</a>
                <a href="{{ route('page.show', 'about') }}" class="block py-2 hover:text-blue-600">О нас</a>
                <a href="{{ route('reviews.index') }}" class="block py-2 hover:text-blue-600">Отзывы</a>
                <a href="{{ route('page.show', 'contacts') }}" class="block py-2 hover:text-blue-600">Контакты</a>
                <div class="flex space-x-4 py-2 font-bold border-t pt-4 mt-2">
                     <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'ru'])) }}" class="{{ app()->getLocale() == 'ru' ? 'text-blue-600' : 'text-gray-500' }}">RU</a>
                     <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'en'])) }}" class="{{ app()->getLocale() == 'en' ? 'text-blue-600' : 'text-gray-500' }}">EN</a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-10">
        @yield('content')
    </main>

    <!-- ===== Подвал (Footer) ===== -->
    <footer id="footer" class="bg-gray-900 text-white pt-16 pb-8 mt-auto">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center gap-2 mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ \App\Models\Setting::get('site_name', 'KyrgyzTour') }}
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Ваш надежный проводник в мир приключений по Кыргызстану.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4 text-white">Компания</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('page.show', 'about') }}" class="hover:text-blue-400 transition">О нас</a></li>
                        <li><a href="{{ route('reviews.index') }}" class="hover:text-blue-400 transition">Отзывы</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4 text-white">Направления</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('direction.show', 'issyk-kul') }}" class="hover:text-blue-400 transition">Иссык-Куль</a></li>
                        <li><a href="{{ route('direction.show', 'naryn') }}" class="hover:text-blue-400 transition">Нарын</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4 text-white">Контакты</h3>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ \App\Models\Setting::get('email', 'info@kyrgyztour.kg') }}</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> {{ \App\Models\Setting::get('phone', '+996 (555) 123-456') }}</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; 2024 {{ \App\Models\Setting::get('site_name', 'KyrgyzTour') }}. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
