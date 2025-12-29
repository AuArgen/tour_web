@extends('layouts.public')

@section('title', 'Направления - ' . \App\Models\Setting::get('site_name', 'KyrgyzTour'))

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-12 text-center">Направления</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($directions as $direction)
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
    </div>
@endsection
