@extends('layouts.admin')

@section('header', 'Панель управления')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Карточка 1 -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm">Направления</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Direction::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Карточка 2 -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm">Туры</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Tour::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Карточка 3 -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm">Отзывы</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Review::count() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
