@extends('layouts.admin')

@section('header', 'Багытты оңдоо: ' . ($direction->getAttributes()['name']['ru'] ?? ''))

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.directions.update', $direction->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Жалпы маалыматтар -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" value="{{ $direction->slug }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Сүрөт</label>
                    @if($direction->image_url)
                        <img src="{{ $direction->image_url }}" class="h-20 w-auto mb-2 rounded">
                    @endif
                    <input type="file" name="image_url" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <hr class="my-6">

            <!-- Көп тилдүү маалыматтар -->
            <div class="space-y-8">
                @foreach($languages as $lang)
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-bold mb-4 flex items-center">
                            <span class="uppercase bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">{{ $lang->code }}</span>
                            {{ $lang->name }}
                        </h3>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Аталышы</label>
                                <input type="text" name="name[{{ $lang->code }}]" value="{{ $direction->getAttributes()['name'][$lang->code] ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Сүрөттөмө</label>
                                <textarea name="description[{{ $lang->code }}]" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $direction->getAttributes()['description'][$lang->code] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-bold">
                    Жаңыртуу
                </button>
            </div>
        </form>
    </div>
@endsection
