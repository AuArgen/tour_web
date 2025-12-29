@extends('layouts.public')

@section('title', $page->title . ' - ' . \App\Models\Setting::get('site_name', 'KyrgyzTour'))

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-8 text-center">{{ $page->title }}</h1>

        @if($page->image_url)
            <img src="{{ $page->image_url }}" alt="{{ $page->title }}" class="w-full h-64 md:h-96 object-cover rounded-2xl shadow-lg mb-8">
        @endif

        <div class="prose max-w-none mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            {!! $page->content !!}
        </div>
    </div>
@endsection
