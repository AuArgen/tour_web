@extends('layouts.public')

@section('title', $tour->name . ' - ' . \App\Models\Setting::get('site_name', 'KyrgyzTour'))
@section('description', \Illuminate\Support\Str::limit($tour->description, 150))

@section('content')
    <!-- ===== Hero Section ===== -->
    <section class="relative h-[60vh] bg-cover bg-center text-white" style="background-image: url('{{ $tour->hero_image }}');">
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/70"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <nav class="text-sm mb-4 bg-black/30 px-4 py-2 rounded-full backdrop-blur-sm">
                <a href="{{ route('home') }}" class="hover:text-blue-300 transition">Главная</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('tours.index') }}" class="hover:text-blue-300 transition">Туры</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-gray-200">{{ $tour->name }}</span>
            </nav>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight drop-shadow-xl max-w-4xl">{{ $tour->name }}</h1>
        </div>
    </section>

    <div class="container mx-auto px-6 py-16">
        <div class="lg:grid lg:grid-cols-3 lg:gap-12">
            <!-- Левая колонка: Контент -->
            <div class="lg:col-span-2">

                <!-- Описание -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 mb-10">
                    <div class="prose max-w-none">
                        <h3 class="text-2xl font-bold mb-4 flex items-center">
                            <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            О туре
                        </h3>
                        <p class="text-lg leading-relaxed">{{ $tour->description }}</p>
                    </div>
                </div>

                <!-- Характеристики (Grid) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                    <div class="bg-white rounded-xl p-5 text-center shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Длительность</p>
                        <p class="font-bold text-gray-900 mt-1">{{ $tour->duration }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 text-center shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Сложность</p>
                        <p class="font-bold text-gray-900 mt-1">{{ $tour->difficulty }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 text-center shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3 text-yellow-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Группа</p>
                        <p class="font-bold text-gray-900 mt-1">{{ $tour->group_size }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 text-center shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3 text-red-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Цена от</p>
                        <p class="font-bold text-gray-900 mt-1">${{ $tour->price }}</p>
                    </div>
                </div>

                <!-- Маршрут -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 mb-10">
                    <h3 class="text-2xl font-bold mb-6 flex items-center">
                        <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-.806-.984A11.966 11.966 0 0115 7m0 13V7"></path></svg>
                        Программа тура
                    </h3>
                    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                        @foreach($tour->itinerary as $item)
                            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                <!-- Icon -->
                                <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-300 group-[.is-active]:bg-blue-500 text-slate-500 group-[.is-active]:text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                    <span class="font-bold text-sm">{{ $item->day_number }}</span>
                                </div>
                                <!-- Card -->
                                <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-gray-50 p-4 rounded-xl border border-gray-100 shadow-sm">
                                    <div class="flex items-center justify-between space-x-2 mb-1">
                                        <div class="font-bold text-slate-900">{{ $item->title }}</div>
                                        <time class="font-caveat font-medium text-blue-500 text-sm">День {{ $item->day_number }}</time>
                                    </div>
                                    <div class="text-slate-500 text-sm">{{ $item->description }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Галерея -->
                <div class="mb-10">
                    <h3 class="text-2xl font-bold mb-6 text-gray-900">Галерея</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($tour->gallery as $index => $image)
                            <div class="relative overflow-hidden rounded-xl shadow-md group h-64 {{ $index === 0 ? 'md:col-span-2 md:h-96' : '' }}">
                                <img src="{{ $image }}" alt="Gallery image" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Аккордеон (FAQ) -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Важная информация</h3>
                    <div class="space-y-4" id="accordion-container">
                        <!-- Аккордеон 1 -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="accordion-button w-full flex justify-between items-center p-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="flex items-center"><svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg> Что взять с собой?</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="accordion-content bg-white">
                                <div class="p-5 text-gray-600 prose text-sm">
                                    <ul class="list-disc pl-5 space-y-1">
                                        <li><strong>Одежда:</strong> треккинговые ботинки, мембранная куртка, флиска, термобелье.</li>
                                        <li><strong>Снаряжение:</strong> рюкзак (30-50л), спальник (если ночевка в палатках), палки.</li>
                                        <li><strong>Личное:</strong> крем от загара, очки, аптечка, powerbank.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Аккордеон 2 -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="accordion-button w-full flex justify-between items-center p-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="flex items-center"><svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> Проживание</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="accordion-content bg-white">
                                <div class="p-5 text-gray-600 prose text-sm">
                                    <p>Размещение в комфортабельных гостевых домах, юрточных лагерях (с удобствами) или современных палатках в зависимости от маршрута.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Аккордеон 3 -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="accordion-button w-full flex justify-between items-center p-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="flex items-center"><svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg> Питание</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="accordion-content bg-white">
                                <div class="p-5 text-gray-600 prose text-sm">
                                    <p>3-х разовое питание включено. Национальная и европейская кухня. Учитываем вегетарианские предпочтения по запросу.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Правая колонка: Бронирование (Sticky) -->
            <div class="lg:col-span-1 mt-12 lg:mt-0">
                <div class="sticky top-28 space-y-6">
                    <!-- Карточка цены -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <div class="text-center mb-6 pb-6 border-b border-gray-100">
                            <span class="text-sm text-gray-500 uppercase tracking-wide">Стоимость тура</span>
                            <div class="flex items-center justify-center mt-2">
                                <span class="text-5xl font-extrabold text-blue-600">${{ $tour->price }}</span>
                                <span class="text-gray-400 ml-2 text-lg">/ чел</span>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span>Профессиональный гид</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span>Трансфер и логистика</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span>Питание и проживание</span>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white text-lg font-bold py-4 rounded-xl hover:bg-blue-700 hover:shadow-lg transform hover:-translate-y-0.5 transition duration-300 mb-3">
                            Забронировать место
                        </button>

                        <a href="{{ \App\Models\Setting::get('whatsapp_url', '#') }}" target="_blank" class="w-full flex items-center justify-center bg-green-500 text-white text-lg font-bold py-4 rounded-xl hover:bg-green-600 hover:shadow-lg transform hover:-translate-y-0.5 transition duration-300">
                            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            Написать в WhatsApp
                        </a>
                    </div>

                    <!-- Карта -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                        <div class="p-4 bg-gray-50 border-b border-gray-100 font-bold text-gray-700">
                            Карта маршрута
                        </div>
                        <div class="h-64 w-full">
                            <iframe
                                src="https://yandex.ru/map-widget/v1/?ll=77.693444%2C42.242429&mode=constructor&um=constructor%3A20b462662495332961544f318393542a8d335639d3368754d8422842a294b6a7&source=constructor"
                                width="100%"
                                height="100%"
                                frameborder="0">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
