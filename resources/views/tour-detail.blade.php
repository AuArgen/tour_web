<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Треккинг к озеру Ала-Куль - Туры по Кыргызстану</title>
    <meta name="description" content="Детальная информация о треккинг-туре к высокогорному озеру Ала-Куль. Маршрут, цены, что включено.">

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .prose h3 {
            margin-bottom: 0.5em;
            font-size: 1.25rem;
            font-weight: 700;
        }
        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
        }
    </style>
</head>
<body class="bg-white text-gray-800">

<!-- ===== Шапка (Header) ===== -->
<header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-gray-900">
            KyrgyzTour
        </a>
        <div class="hidden md:flex space-x-8 items-center">
            <a href="/#tours" class="text-gray-600 hover:text-blue-600 transition duration-300">Туры</a>
            <a href="/#about" class="text-gray-600 hover:text-blue-600 transition duration-300">О нас</a>
            <a href="/#reviews" class="text-gray-600 hover:text-blue-600 transition duration-300">Отзывы</a>
            <a href="/#footer" class="text-gray-600 hover:text-blue-600 transition duration-300">Контакты</a>
        </div>
        <a href="/#tours" class="hidden md:block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">Все туры</a>

        <!-- Мобильное меню - кнопка -->
        <button id="mobile-menu-button" class="md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </nav>
    <!-- Мобильное меню - контент -->
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-2">
        <a href="/#tours" class="block text-gray-600 hover:text-blue-600">Туры</a>
        <a href="/#about" class="block text-gray-600 hover:text-blue-600">О нас</a>
        <a href="/#reviews" class="block text-gray-600 hover:text-blue-600">Отзывы</a>
        <a href="/#footer" class="block text-gray-600 hover:text-blue-600">Контакты</a>
        <a href="/#tours" class="block mt-4 bg-blue-600 text-white text-center px-6 py-2 rounded-full hover:bg-blue-700">Все туры</a>
    </div>
</header>

<!-- ===== Hero Section ===== -->
<section class="relative h-[50vh] bg-cover bg-center text-white" style="background-image: url('https://images.unsplash.com/photo-1600231233059-f79385925361?q=80&w=2070&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
        <nav class="text-sm mb-2">
            <a href="/" class="hover:underline">Главная</a>
            <span class="mx-2">/</span>
            <a href="/#tours" class="hover:underline">Туры</a>
        </nav>
        <h1 class="text-4xl md:text-6xl font-bold leading-tight">Треккинг к озеру Ала-Куль</h1>
    </div>
</section>

<main class="container mx-auto px-6 py-12">
    <!-- Основной контент -->
    <div class="lg:grid lg:grid-cols-3 lg:gap-12">
        <!-- Левая колонка: Галерея и описание -->
        <div class="lg:col-span-2">
            <!-- Описание и маршрут -->
            <div class="prose max-w-none text-gray-700">
                <!-- Секция Описание с картинкой слева -->
                <div class="md:flex md:items-start md:gap-8 not-prose">
                    <img src="https://images.unsplash.com/photo-1619194999999-76f81a7fca80?q=80&w=800&auto=format&fit=crop" alt="Долина" class="w-full md:w-1/3 rounded-lg shadow-lg object-cover mb-4 md:mb-0">
                    <div class="prose">
                        <h3>Описание тура</h3>
                        <p>Приготовьтесь к незабываемому приключению в самом сердце Тянь-Шаня! Наш треккинг к озеру Ала-Куль — это путешествие к одному из самых впечатляющих высокогорных озер Кыргызстана. Бирюзовые воды Ала-Куля, расположенного на высоте 3560 метров, окружены величественными заснеженными вершинами. Этот маршрут идеально подходит для любителей активного отдыха, готовых к физическим нагрузкам в обмен на захватывающие дух пейзажи.</p>
                    </div>
                </div>

                <!-- ===== Ключевая информация о туре ===== -->
                <section class="my-12 not-prose">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4 text-center border border-gray-200">
                            <svg class="w-8 h-8 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="mt-2 text-sm text-gray-500">Длительность</p>
                            <p class="font-semibold text-gray-900">4 дня / 3 ночи</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-center border border-gray-200">
                            <svg class="w-8 h-8 text-green-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            <p class="mt-2 text-sm text-gray-500">Сложность</p>
                            <p class="font-semibold text-gray-900">Средняя</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-center border border-gray-200">
                            <svg class="w-8 h-8 text-yellow-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <p class="mt-2 text-sm text-gray-500">Группа</p>
                            <p class="font-semibold text-gray-900">до 10 чел.</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-center border border-gray-200">
                            <svg class="w-8 h-8 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01"></path></svg>
                            <p class="mt-2 text-sm text-gray-500">Цена от</p>
                            <p class="font-semibold text-gray-900">$500</p>
                        </div>
                    </div>
                </section>

                <h3 class="mt-8">Маршрут по дням</h3>
                <h4>День 1: Каракол – Ущелье Алтын-Арашан</h4>
                <p>Встреча в городе Каракол, трансфер в ущелье Алтын-Арашан, знаменитое своими горячими источниками. Размещение в юрточном лагере, акклиматизация и отдых.</p>

                <h4>День 2: Перевал Ала-Куль Северный</h4>
                <p>Ранний подъем и начало трека. Сегодня нас ждет главный вызов — подъем на перевал Ала-Куль Северный (3900 м). С перевала открывается первая панорама на озеро. Спуск к озеру, установка лагеря на берегу.</p>

                <h4>День 3: Озеро Ала-Куль – Ущелье Каракол</h4>
                <p>Прогулка вдоль берега озера, наслаждаемся видами. После обеда начинаем спуск в живописное ущелье Каракол. Ночевка в палатках у реки.</p>

                <h4>День 4: Возвращение в Каракол</h4>
                <p>Заключительный день трека. Мы пройдем по ущелью Каракол до места, где нас будет ждать транспорт. Возвращение в город Каракол, завершение программы.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                    <div>
                        <h3>Что включено:</h3>
                        <ul>
                            <li>Услуги профессионального горного гида</li>
                            <li>Трансферы по программе</li>
                            <li>Проживание в палатках и юртах</li>
                            <li>Трехразовое питание на маршруте</li>
                            <li>Все необходимые пермиты и входные билеты</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Что не включено:</h3>
                        <ul>
                            <li>Авиаперелеты до Кыргызстана</li>
                            <li>Медицинская страховка</li>
                            <li>Личные расходы и напитки</li>
                            <li>Аренда личного снаряжения (спальник, коврик)</li>
                        </ul>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- Галерея -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Галерея тура</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <img src="https://images.unsplash.com/photo-1598434993893-f4379235a14c?q=80&w=800&auto=format&fit=crop" alt="Горы" class="rounded-lg object-cover aspect-square hover:opacity-90 transition-opacity">
                    <img src="https://images.unsplash.com/photo-1634406372593-50296228b46a?q=80&w=800&auto=format&fit=crop" alt="Юрты" class="rounded-lg object-cover aspect-square hover:opacity-90 transition-opacity">
                    <img src="https://images.unsplash.com/photo-1622769250252-1588cbf35a4c?q=80&w=800&auto=format&fit=crop" alt="Иссык-Куль" class="rounded-lg object-cover aspect-square hover:opacity-90 transition-opacity">
                    <img src="https://images.unsplash.com/photo-1600231233059-f79385925361?q=80&w=800&auto=format&fit=crop" alt="Ала-Куль" class="rounded-lg object-cover aspect-square hover:opacity-90 transition-opacity">
                    <img src="https://images.unsplash.com/photo-1619194999999-76f81a7fca80?q=80&w=800&auto=format&fit=crop" alt="Долина" class="rounded-lg object-cover aspect-square hover:opacity-90 transition-opacity">
                    <img src="https://images.unsplash.com/photo-1549693577-6417c1cec33f?q=80&w=800&auto=format&fit=crop" alt="Пейзаж" class="rounded-lg object-cover aspect-square hover:opacity-90 transition-opacity">
                </div>
            </div>
        </div>

        <!-- Правая колонка: Бронирование -->
        <div class="lg:col-span-1 mt-12 lg:mt-0">
            <div class="sticky top-28 bg-gray-50 rounded-lg shadow-lg p-6">
                <div class="text-center mb-6">
                    <span class="text-sm text-gray-500">Цена за человека</span>
                    <p class="text-4xl font-bold text-gray-900">$500</p>
                </div>
                <ul class="space-y-4 text-gray-700 mb-6">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span><strong>Длительность:</strong> 4 дня / 3 ночи</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span><strong>Сложность:</strong> Средняя / Высокая</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span><strong>Группа:</strong> до 10 человек</span>
                    </li>
                </ul>
                <button class="w-full bg-blue-600 text-white text-lg font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    Забронировать тур
                </button>
            </div>
        </div>
    </div>
</main>

<!-- ===== Подвал (Footer) ===== -->
<footer id="footer" class="bg-gray-900 text-white mt-16">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h3 class="text-xl font-bold mb-4">KyrgyzTour</h3>
                <p class="text-gray-400">Ваш проводник в мир приключений по Кыргызстану.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Навигация</h3>
                <ul class="space-y-2">
                    <li><a href="/#tours" class="text-gray-400 hover:text-white">Туры</a></li>
                    <li><a href="/#about" class="text-gray-400 hover:text-white">О нас</a></li>
                    <li><a href="/#reviews" class="text-gray-400 hover:text-white">Отзывы</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Контакты</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>Email: info@kyrgyztour.kg</li>
                    <li>Телефон: +996 (555) 123-456</li>
                    <li>Адрес: г. Бишкек, ул. Исанова, 1</li>
                </ul>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-sm mb-4 md:mb-0">&copy; 2024 KyrgyzTour. Все права защищены.</p>
        </div>
    </div>
</footer>

<script>
    // Скрипт для мобильного меню
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Плавный скролл по якорям (для ссылок на главной)
    document.querySelectorAll('a[href^="/#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (window.location.pathname === '/' && href.startsWith('/#')) {
                e.preventDefault();
                const targetId = href.substring(2);
                document.getElementById(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

</body>
</html>
