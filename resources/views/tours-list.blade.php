@extends('layouts.public')

@section('title', 'Все туры - ' . \App\Models\Setting::get('site_name', 'KyrgyzTour'))

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-12 text-center">Все туры</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($tours as $tour)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="{{ $tour->hero_image }}" alt="{{ $tour->name }}" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="text-xs font-bold text-blue-600 uppercase mb-2">{{ $tour->direction->name }}</div>
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
    </div>
@endsection
