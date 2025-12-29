<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Language;
use App\Models\Page;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\TourItinerary;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Админ колдонуучу
        User::create([
            'name' => 'Admin',
            'email' => 'admin@kyrgyztour.kg',
            'password' => Hash::make('password'), // Пароль: password
        ]);

        // 1. Тилдер
        Language::create(['code' => 'ru', 'name' => 'Русский', 'is_active' => true, 'is_default' => true]);
        Language::create(['code' => 'en', 'name' => 'English', 'is_active' => true, 'is_default' => false]);

        // 2. Жөндөөлөр
        $settings = [
            ['key' => 'site_name', 'value' => ['ru' => 'KyrgyzTour', 'en' => 'KyrgyzTour']],
            ['key' => 'phone', 'value' => ['ru' => '+996 (555) 123-456', 'en' => '+996 (555) 123-456']],
            ['key' => 'email', 'value' => ['ru' => 'info@kyrgyztour.kg', 'en' => 'info@kyrgyztour.kg']],
            ['key' => 'address', 'value' => ['ru' => 'г. Бишкек, ул. Исанова, 1', 'en' => 'Bishkek, Isanova str, 1']],
            ['key' => 'whatsapp_url', 'value' => ['ru' => 'https://wa.me/996555123456', 'en' => 'https://wa.me/996555123456']],
            ['key' => 'instagram_url', 'value' => ['ru' => '#', 'en' => '#']],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        // 3. Барактар (Pages)
        Page::create([
            'slug' => 'about',
            'title' => ['ru' => 'О нас', 'en' => 'About Us'],
            'content' => [
                'ru' => '<p>Мы — команда профессионалов, влюбленных в горы Кыргызстана. Наша миссия — показать миру красоту нашей страны.</p><p>Мы работаем с 2019 года и организовали более 500 туров.</p>',
                'en' => '<p>We are a team of professionals in love with the mountains of Kyrgyzstan. Our mission is to show the world the beauty of our country.</p><p>We have been working since 2019 and have organized over 500 tours.</p>'
            ],
            'image_url' => 'https://img.freepik.com/free-photo/hiker-standing-top-mountain-enjoying-view_1150-8962.jpg'
        ]);

        Page::create([
            'slug' => 'contacts',
            'title' => ['ru' => 'Контакты', 'en' => 'Contacts'],
            'content' => [
                'ru' => '<p>Свяжитесь с нами любым удобным способом.</p>',
                'en' => '<p>Contact us in any convenient way.</p>'
            ],
            'image_url' => null
        ]);

        // 4. Отзывтар (Reviews)
        Review::create([
            'author_name' => 'Анна Смирнова',
            'author_country' => 'Россия',
            'text' => [
                'ru' => 'Это было лучшее путешествие в моей жизни! Горы Кыргызстана просто завораживают.',
                'en' => 'It was the best trip of my life! The mountains of Kyrgyzstan are simply mesmerizing.'
            ],
            'rating' => 5,
        ]);

        Review::create([
            'author_name' => 'Mark Weber',
            'author_country' => 'Germany',
            'text' => [
                'ru' => 'Поход к Ала-Кулю был сложным, но виды того стоили. Организация супер.',
                'en' => 'The hike to Ala-Kul was difficult, but the views were worth it. The organization is super.'
            ],
            'rating' => 5,
        ]);

        // 5. Багыттар
        $issykKul = Direction::create([
            'name' => ['ru' => 'Иссык-Кульская область', 'en' => 'Issyk-Kul Region'],
            'slug' => 'issyk-kul',
            'description' => [
                'ru' => 'Жемчужина Кыргызстана, окруженная заснеженными пиками. Пляжный отдых, треккинг и горячие источники.',
                'en' => 'The pearl of Kyrgyzstan, surrounded by snowy peaks. Beach holidays, trekking and hot springs.'
            ],
            'image_url' => 'https://itmc.travel/wp-content/uploads/2021/03/Terskey-1200x700-4.jpg',
        ]);

        $alay = Direction::create([
            'name' => ['ru' => 'Алайский регион', 'en' => 'Alay Region'],
            'slug' => 'alay',
            'description' => [
                'ru' => 'Величественные памирские пейзажи, суровые перевалы и аутентичная культура горных кочевников.',
                'en' => 'Majestic Pamir landscapes, harsh passes and authentic culture of mountain nomads.'
            ],
            'image_url' => 'https://destinationkarakol.com/wp-content/uploads/2021/03/Alakul-lake-2000-x-1333.jpg',
        ]);

        $naryn = Direction::create([
            'name' => ['ru' => 'Нарынская область', 'en' => 'Naryn Region'],
            'slug' => 'naryn',
            'description' => [
                'ru' => 'Сердце Тянь-Шаня. Высокогорные озера Сон-Куль и Чатыр-Куль, юрточные лагеря и бескрайние пастбища.',
                'en' => 'The heart of the Tien Shan. High mountain lakes Son-Kul and Chatyr-Kul, yurt camps and endless pastures.'
            ],
            'image_url' => 'https://triptokyrgyzstan.com/sites/default/files/images/2019-01/trek_in_altyn-arashan_gorge.png',
        ]);

        // 6. Турлар

        // Тур 1: Ала-Куль
        $alaKulTour = Tour::create([
            'direction_id' => $issykKul->id,
            'name' => ['ru' => 'Треккинг к озеру Ала-Куль', 'en' => 'Trekking to Lake Ala-Kul'],
            'slug' => 'trekking-to-ala-kul',
            'description' => [
                'ru' => 'Приготовьтесь к незабываемому приключению в самом сердце Тянь-Шаня! Наш треккинг к озеру Ала-Куль — это путешествие к одному из самых впечатляющих высокогорных озер Кыргызстана.',
                'en' => 'Get ready for an unforgettable adventure in the heart of the Tien Shan! Our trekking to Lake Ala-Kul is a journey to one of the most impressive high mountain lakes in Kyrgyzstan.'
            ],
            'short_description' => [
                'ru' => 'Незабываемый поход к одному из самых красивых высокогорных озер Тянь-Шаня.',
                'en' => 'An unforgettable hike to one of the most beautiful high mountain lakes of the Tien Shan.'
            ],
            'hero_image' => 'https://opis-cdn.tinkoffjournal.ru/mercury/15-lake-ala-kul-trip.jpg',
            'price' => 500.00,
            'duration' => ['ru' => '4 дня / 3 ночи', 'en' => '4 days / 3 nights'],
            'difficulty' => ['ru' => 'Средняя', 'en' => 'Medium'],
            'group_size' => ['ru' => 'до 10 чел.', 'en' => 'up to 10 people'],
        ]);

        $alaKulItinerary = [
            [
                'day_number' => '1',
                'title' => ['ru' => 'Каракол – Ущелье Алтын-Арашан', 'en' => 'Karakol – Altyn-Arashan Gorge'],
                'description' => ['ru' => 'Встреча в городе Каракол...', 'en' => 'Meeting in Karakol city...']
            ],
            [
                'day_number' => '2',
                'title' => ['ru' => 'Перевал Ала-Куль Северный', 'en' => 'Ala-Kul North Pass'],
                'description' => ['ru' => 'Ранний подъем...', 'en' => 'Early rise...']
            ],
        ];
        foreach ($alaKulItinerary as $item) {
            TourItinerary::create(['tour_id' => $alaKulTour->id] + $item);
        }

        TourImage::create(['tour_id' => $alaKulTour->id, 'image_url' => 'https://destinationkarakol.com/wp-content/uploads/2021/03/full_0RVb3ivD1-1024x680.jpg']);
        TourImage::create(['tour_id' => $alaKulTour->id, 'image_url' => 'https://destinationkarakol.com/wp-content/uploads/2021/03/Alakul-lake-2000-x-1333.jpg']);
    }
}
