@extends('layouts.admin')

@section('header', 'Турду оңдоо: ' . ($tour->getAttributes()['name']['ru'] ?? ''))

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Жалпы маалыматтар -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Багыт (Направление)</label>
                    <select name="direction_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @foreach($directions as $direction)
                            <option value="{{ $direction->id }}" {{ $tour->direction_id == $direction->id ? 'selected' : '' }}>
                                @php
                                    $dirName = $direction->getAttributes()['name'];
                                    if (is_string($dirName)) {
                                        $dirName = json_decode($dirName, true);
                                    }
                                @endphp
                                {{ is_array($dirName) ? ($dirName['ru'] ?? 'N/A') : $dirName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" value="{{ $tour->slug }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Баасы ($)</label>
                    <input type="number" name="price" value="{{ $tour->price }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Башкы сүрөт</label>
                    @if($tour->hero_image)
                        <img src="{{ $tour->hero_image }}" class="h-20 w-auto mb-2 rounded">
                    @endif
                    <input type="file" name="hero_image" class="w-full border-gray-300 rounded-md shadow-sm">
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

                        @php
                            // Турдун маалыматтарын коопсуз алуу
                            $tourName = $tour->getAttributes()['name'];
                            if (is_string($tourName)) $tourName = json_decode($tourName, true);

                            $tourShortDesc = $tour->getAttributes()['short_description'] ?? [];
                            if (is_string($tourShortDesc)) $tourShortDesc = json_decode($tourShortDesc, true);

                            $tourDesc = $tour->getAttributes()['description'];
                            if (is_string($tourDesc)) $tourDesc = json_decode($tourDesc, true);

                            $tourDuration = $tour->getAttributes()['duration'];
                            if (is_string($tourDuration)) $tourDuration = json_decode($tourDuration, true);

                            $tourDifficulty = $tour->getAttributes()['difficulty'];
                            if (is_string($tourDifficulty)) $tourDifficulty = json_decode($tourDifficulty, true);

                            $tourGroupSize = $tour->getAttributes()['group_size'];
                            if (is_string($tourGroupSize)) $tourGroupSize = json_decode($tourGroupSize, true);
                        @endphp

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Аталышы</label>
                                <input type="text" name="name[{{ $lang->code }}]" value="{{ $tourName[$lang->code] ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Кыскача сүрөттөмө</label>
                                <textarea name="short_description[{{ $lang->code }}]" rows="2" class="w-full border-gray-300 rounded-md shadow-sm">{{ $tourShortDesc[$lang->code] ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Толук сүрөттөмө</label>
                                <textarea name="description[{{ $lang->code }}]" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $tourDesc[$lang->code] ?? '' }}</textarea>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Узактыгы</label>
                                    <input type="text" name="duration[{{ $lang->code }}]" value="{{ $tourDuration[$lang->code] ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Татаалдыгы</label>
                                    <input type="text" name="difficulty[{{ $lang->code }}]" value="{{ $tourDifficulty[$lang->code] ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Топтун өлчөмү</label>
                                    <input type="text" name="group_size[{{ $lang->code }}]" value="{{ $tourGroupSize[$lang->code] ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>
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
