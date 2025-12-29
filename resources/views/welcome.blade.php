@extends('layouts.public')

@section('content')
    <!-- ===== Главный экран (Hero) ===== -->
    <section class="relative h-screen flex items-center justify-center text-white overflow-hidden">
        <!-- Фон с параллакс эффектом -->
        <div class="absolute inset-0 bg-cover bg-center transform scale-105" style="background-image: url('https://static.wixstatic.com/media/9f9420_d687074eb55844d98c52bdf43e67645d~mv2.jpg/v1/fill/w_1920,h_1080,al_c,q_85,enc_auto/ik_DE2wlxk.jpg'); filter: brightness(0.7);"></div>

        <!-- Градиент -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/60"></div>

        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-600/30 border border-blue-400 text-blue-100 text-sm font-semibold mb-6 backdrop-blur-sm animate-fade-in-down">
                Сезон 2024 открыт
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 drop-shadow-lg">
                Откройте для себя <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-300">Кыргызстан</span>
            </h1>
            <p class="text-lg md:text-2xl font-light mb-10 max-w-3xl mx-auto text-gray-200">
                Страна небесных гор, кристальных озер и древней культуры кочевников. Путешествуйте с комфортом и душой.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('directions.index') }}" class="bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-bold hover:bg-blue-700 hover:shadow-blue-500/50 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    Выбрать направление
                </a>
                <a href="{{ route('page.show', 'about') }}" class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full text-lg font-bold hover:bg-white/20 transition duration-300">
                    Узнать больше
                </a>
            </div>
        </div>

        <!-- Скролл вниз иконка -->
        <div class="absolute bottom-10 animate-bounce">
            <svg class="w-8 h-8 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <!-- ===== Статистика ===== -->
    <section class="py-12 bg-white shadow-sm relative z-20 -mt-8 mx-4 md:mx-auto md:max-w-5xl rounded-xl border border-gray-100">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100">
            <div>
                <p class="text-4xl font-bold text-blue-600">5+</p>
                <p class="text-gray-500 text-sm mt-1">Лет опыта</p>
            </div>
            <div>
                <p class="text-4xl font-bold text-blue-600">1000+</p>
                <p class="text-gray-500 text-sm mt-1">Довольных туристов</p>
            </div>
            <div>
                <p class="text-4xl font-bold text-blue-600">20+</p>
                <p class="text-gray-500 text-sm mt-1">Уникальных туров</p>
            </div>
            <div>
                <p class="text-4xl font-bold text-blue-600">24/7</p>
                <p class="text-gray-500 text-sm mt-1">Поддержка</p>
            </div>
        </div>
    </section>

    <!-- ===== Направления (Кыскача) ===== -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">Популярные направления</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Мы отобрали для вас самые живописные и интересные локации Кыргызстана.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach(\App\Models\Direction::take(3)->get() as $direction)
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden h-72">
                            <img src="{{ $direction->image_url }}" alt="{{ $direction->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-80"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="text-2xl font-bold">{{ $direction->name }}</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 mb-6 line-clamp-3">{{ $direction->description }}</p>
                            <a href="{{ route('direction.show', ['slug' => $direction->slug]) }}" class="inline-flex items-center text-blue-600 font-bold hover:text-blue-800 transition">
                                Смотреть туры <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('directions.index') }}" class="inline-block border-2 border-blue-600 text-blue-600 px-8 py-3 rounded-full font-bold hover:bg-blue-600 hover:text-white transition duration-300">Все направления</a>
            </div>
        </div>
    </section>

    <!-- ===== Newsletter ===== -->
    <section class="py-20 bg-blue-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Хотите первыми узнавать о новых турах?</h2>
            <p class="text-blue-200 mb-8 max-w-2xl mx-auto">Подпишитесь на нашу рассылку и получите скидку 5% на первое бронирование.</p>

            <form class="max-w-md mx-auto flex flex-col md:flex-row gap-4">
                <input type="email" placeholder="Ваш Email" class="flex-1 px-6 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="button" class="bg-blue-500 hover:bg-blue-400 text-white px-8 py-3 rounded-full font-bold transition duration-300 shadow-lg">Подписаться</button>
            </form>
        </div>
    </section>
@endsection
