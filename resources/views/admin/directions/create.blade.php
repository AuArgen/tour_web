@extends('layouts.admin')

@section('header', 'Жаңы багыт кошуу')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.directions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Жалпы маалыматтар -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Сүрөт</label>
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
                                <input type="text" name="name[{{ $lang->code }}]" id="name_{{ $lang->code }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Сүрөттөмө</label>
                                <textarea name="description[{{ $lang->code }}]" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-bold">
                    Сактоо
                </button>
            </div>
        </form>
    </div>

    <script>
        // Slug генерациялоо скрипти
        document.addEventListener('DOMContentLoaded', function() {
            // Демейки тилдин (RU) аталышын угабыз
            const nameInput = document.getElementById('name_ru');
            const slugInput = document.getElementById('slug');

            if (nameInput && slugInput) {
                nameInput.addEventListener('input', function() {
                    const text = nameInput.value;
                    const slug = slugify(text);
                    slugInput.value = slug;
                });
            }

            function slugify(text) {
                const ru = {
                    'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
                    'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i',
                    'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                    'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't',
                    'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch',
                    'ш': 'sh', 'щ': 'sch', 'ъ': '', 'ы': 'y', 'ь': '',
                    'э': 'e', 'ю': 'yu', 'я': 'ya',
                    'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D',
                    'Е': 'E', 'Ё': 'E', 'Ж': 'Zh', 'З': 'Z', 'И': 'I',
                    'Й': 'Y', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N',
                    'О': 'O', 'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T',
                    'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C', 'Ч': 'Ch',
                    'Ш': 'Sh', 'Щ': 'Sch', 'Ъ': '', 'Ы': 'Y', 'Ь': '',
                    'Э': 'E', 'Ю': 'Yu', 'Я': 'Ya'
                };

                return text.split('').map(function(char) {
                    return ru[char] || char;
                }).join('')
                .toString()
                .toLowerCase()
                .trim()
                .replace(/\s+/g, '-')     // Боштуктарды - кылуу
                .replace(/[^\w\-]+/g, '') // Атайын белгилерди өчүрүү
                .replace(/\-\-+/g, '-');  // Көп сызыкчаларды бирөө кылуу
            }
        });
    </script>
@endsection
