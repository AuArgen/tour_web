@extends('layouts.public')

@section('title', $direction->name . ' - ' . \App\Models\Setting::get('site_name', 'KyrgyzTour'))
@section('description', \Illuminate\Support\Str::limit($direction->description, 150))

@section('content')
    <!-- ===== Hero Section ===== -->
    <section class="relative h-[40vh] bg-cover bg-center text-white" style="background-image: url('{{ $direction->image_url }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <nav class="text-sm mb-2">
                <a href="{{ route('home') }}" class="hover:underline">Главная</a>
                <span class="mx-2">/</span>
                <a href="{{ route('directions.index') }}" class="hover:underline">Направления</a>
            </nav>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight">{{ $direction->name }}</h1>
            <p class="text-lg md:text-xl font-light mt-2 max-w-2xl">{{ $direction->description }}</p>
        </div>
    </section>

    <!-- ===== Список туров ===== -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Туры в регионе</h2>
            @if($tours->isEmpty())
                <p class="text-center text-gray-600">В этом направлении пока нет доступных туров. Мы скоро добавим новые маршруты!</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($tours as $tour)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                            <img src="{{ $tour->hero_image }}" alt="{{ $tour->name }}" class="w-full h-56 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $tour->name }}</h3>
                                <p class="text-gray-600 mb-4 h-24 overflow-hidden">{{ $tour->short_description }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-blue-600">от ${{ $tour->price }}</span>
                                    <a href="{{ route('tour.detail', ['slug' => $tour->slug]) }}" class="text-blue-600 font-semibold hover:underline">Подробнее →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
