@extends('layouts.public')

@section('title', 'Отзывы - ' . \App\Models\Setting::get('site_name', 'KyrgyzTour'))

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-12 text-center">Отзывы наших туристов</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($reviews as $review)
                <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 relative">
                    <div class="text-yellow-400 flex mb-4">
                        @for($i = 0; $i < $review->rating; $i++) ★ @endfor
                    </div>
                    <p class="text-gray-600 mb-6 italic">"{{ $review->text }}"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-xl font-bold text-gray-500 mr-4 overflow-hidden">
                            @if($review->avatar_url)
                                <img src="{{ $review->avatar_url }}" alt="{{ $review->author_name }}" class="w-full h-full object-cover">
                            @else
                                {{ mb_substr($review->author_name, 0, 1) }}
                            @endif
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">{{ $review->author_name }}</p>
                            <p class="text-sm text-gray-500">{{ $review->author_country }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
