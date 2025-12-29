@extends('layouts.admin')

@section('header', 'Турлар')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Турлардын тизмеси</h1>
        <a href="{{ route('admin.tours.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Жаңы тур кошуу
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Сүрөт
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Аталышы (RU)
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Багыт
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Баасы
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Аракеттер
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($tours as $tour)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full object-cover" src="{{ $tour->hero_image }}" alt="" />
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{-- Коопсуз жол: Эгер массив болсо 'ru'ну алабыз, болбосо жөн эле чыгарабыз --}}
                                @php
                                    $name = $tour->getAttributes()['name'];
                                    if (is_string($name)) {
                                        $name = json_decode($name, true);
                                    }
                                @endphp
                                {{ is_array($name) ? ($name['ru'] ?? 'N/A') : $name }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @php
                                    $dirName = $tour->direction->getAttributes()['name'];
                                    if (is_string($dirName)) {
                                        $dirName = json_decode($dirName, true);
                                    }
                                @endphp
                                {{ is_array($dirName) ? ($dirName['ru'] ?? 'N/A') : $dirName }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">${{ $tour->price }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.tours.edit', $tour->id) }}" class="text-blue-600 hover:text-blue-900">Оңдоо</a>
                                <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" onsubmit="return confirm('Чын эле өчүрөсүзбү?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Өчүрүү</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $tours->links() }}
        </div>
    </div>
@endsection
