<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туры по Кыргызстану - Откройте для себя страну небесных гор</title>
    <meta name="description" content="Увлекательные туры и путешествия по Кыргызстану. Исследуйте горы, озера и культуру кочевников с нашими профессиональными гидами.">

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
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
                <a href="#tours" class="text-gray-600 hover:text-blue-600 transition duration-300">Туры</a>
                <a href="#about" class="text-gray-600 hover:text-blue-600 transition duration-300">О нас</a>
                <a href="#reviews" class="text-gray-600 hover:text-blue-600 transition duration-300">Отзывы</a>
                <a href="#footer" class="text-gray-600 hover:text-blue-600 transition duration-300">Контакты</a>
            </div>
            <a href="#tours" class="hidden md:block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">Подобрать тур</a>

            <!-- Мобильное меню - кнопка -->
            <button id="mobile-menu-button" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </nav>
        <!-- Мобильное меню - контент -->
        <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-2">
            <a href="#tours" class="block text-gray-600 hover:text-blue-600">Туры</a>
            <a href="#about" class="block text-gray-600 hover:text-blue-600">О нас</a>
            <a href="#reviews" class="block text-gray-600 hover:text-blue-600">Отзывы</a>
            <a href="#footer" class="block text-gray-600 hover:text-blue-600">Контакты</a>
            <a href="#tours" class="block mt-4 bg-blue-600 text-white text-center px-6 py-2 rounded-full hover:bg-blue-700">Подобрать тур</a>
        </div>
    </header>

    <main>
        <!-- ===== Главный экран (Hero Section) ===== -->
        <section class="relative h-[60vh] md:h-[80vh] bg-cover bg-center text-white" style="background-image: url('https://images.unsplash.com/photo-1598434993893-f4379235a14c?q=80&w=2070&auto=format&fit=crop');">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-4">Откройте для себя Кыргызстан</h1>
                <p class="text-lg md:text-2xl font-light mb-8 max-w-3xl">Страна небесных гор, кристальных озер и древней культуры кочевников</p>
                <a href="#tours" class="bg-blue-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-blue-700 transition duration-300">Смотреть все туры</a>
            </div>
        </section>

        <!-- ===== Популярные туры ===== -->
        <section id="tours" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Популярные туры</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Карточка тура 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://images.unsplash.com/photo-1600231233059-f79385925361?q=80&w=1974&auto=format&fit=crop" alt="Озеро Ала-Куль" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Треккинг к озеру Ала-Куль</h3>
                            <p class="text-gray-600 mb-4">Незабываемый поход к одному из самых красивых высокогорных озер Тянь-Шаня.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">от $500</span>
                                <a href="{{ route('tour.detail', ['slug' => 'trekking-to-ala-kul']) }}" class="text-blue-600 font-semibold hover:underline">Подробнее →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Карточка тура 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://images.unsplash.com/photo-1622769250252-1588cbf35a4c?q=80&w=2070&auto=format&fit=crop" alt="Озеро Иссык-Куль" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Жемчужина Иссык-Куль</h3>
                            <p class="text-gray-600 mb-4">Отдых на побережье второго по величине соленого озера в мире, окруженного горами.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">от $350</span>
                                <a href="#" class="text-blue-600 font-semibold hover:underline">Подробнее →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Карточка тура 3 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://images.unsplash.com/photo-1634406372593-50296228b46a?q=80&w=2070&auto=format&fit=crop" alt="Юрточный лагерь" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">По следам кочевников</h3>
                            <p class="text-gray-600 mb-4">Погрузитесь в культуру, поживите в юрте и попробуйте национальную кухню у озера Сон-Куль.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">от $420</span>
                                <a href="#" class="text-blue-600 font-semibold hover:underline">Подробнее →</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ===== Почему мы? (About) ===== -->
        <section id="about" class="py-16 md:py-24">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Почему выбирают нас?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 text-blue-600 rounded-full p-4 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Опытные гиды</h3>
                        <p class="text-gray-600">Наши гиды — местные жители, которые знают и любят свою страну.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 text-blue-600 rounded-full p-4 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 20.417l4.5-4.5M12 14a2 2 0 01-2-2h4a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Безопасность</h3>
                        <p class="text-gray-600">Мы заботимся о вашей безопасности на каждом этапе путешествия.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 text-blue-600 rounded-full p-4 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Уникальные маршруты</h3>
                        <p class="text-gray-600">Мы предлагаем не только популярные, но и эксклюзивные туры.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== Отзывы (Reviews) ===== -->
        <section id="reviews" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Что говорят наши гости</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <p class="text-gray-600 mb-4">"Это было лучшее путешествие в моей жизни! Горы Кыргызстана просто завораживают. Спасибо команде за отличную организацию!"</p>
                        <p class="font-bold">- Анна, Москва</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <p class="text-gray-600 mb-4">"Поход к Ала-Кулю был сложным, но виды того стоили. Гид был очень профессиональным и заботливым. Обязательно вернусь еще!"</p>
                        <p class="font-bold">- Марк, Берлин</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ===== Подвал (Footer) ===== -->
    <footer id="footer" class="bg-gray-900 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <h3 class="text-xl font-bold mb-4">KyrgyzTour</h3>
                    <p class="text-gray-400">Ваш проводник в мир приключений по Кыргызстану.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Навигация</h3>
                    <ul class="space-y-2">
                        <li><a href="#tours" class="text-gray-400 hover:text-white">Туры</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">О нас</a></li>
                        <li><a href="#reviews" class="text-gray-400 hover:text-white">Отзывы</a></li>
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
                <!-- Иконки соцсетей можно добавить здесь -->
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

        // Плавный скролл по якорям
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
                // Закрываем мобильное меню после клика по ссылке
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>

</body>
</html>
