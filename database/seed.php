<?php

declare(strict_types=1);

/**
 * CLI seeder: php database/seed.php
 */

spl_autoload_register(function (string $class): void {
    if (str_starts_with($class, 'App\\')) {
        $path = __DIR__ . '/../src/' . str_replace('\\', '/', substr($class, 4)) . '.php';
        if (is_file($path)) {
            require $path;
        }
    }
});

require_once __DIR__ . '/../src/helpers.php';

use App\Database;
use App\Models\Category;
use App\Models\Article;

$pdo = Database::connection();

echo "Seeding database... ";

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE article_category');
$pdo->exec('TRUNCATE TABLE articles');
$pdo->exec('TRUNCATE TABLE categories');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$categories = [
    ['Технологии', 'Статьи о современных технологиях, программировании и IT.'],
    ['Путешествия', 'Заметки о поездках, странах и интересных местах.'],
    ['Еда', 'Рецепты, обзоры ресторанов и кулинарные эксперименты.'],
    ['Наука', 'Популярная наука, открытия и исследования.'],
    ['Спорт', 'Новости спорта, тренировки и здоровый образ жизни.'],
];

$categoryIds = [];
foreach ($categories as [$name, $desc]) {
    $id = Category::create($name, $desc);
    $categoryIds[$name] = $id;
    echo "  Category: {$name} (#{$id}) ";
}

$articles = [
    [
        'title' => 'Введение в PHP 8.1',
        'description' => 'Обзор новых возможностей PHP 8.1: enums, readonly properties и другие.',
        'body' => "PHP 8.1 принёс множество полезных нововведений. Enums позволяют описывать ограниченный набор значений типобезопасно. Readonly-свойства упрощают создание immutable-объектов. Также появились Fibers, never-тип и улучшения производительности.",
        'image' => null,
        'categories' => ['Технологии'],
        'views' => 120,
    ],
    [
        'title' => 'Как настроить Docker для PHP-проекта',
        'description' => 'Пошаговая инструкция по созданию docker-compose для PHP + MySQL + Nginx.',
        'body' => "Docker сильно упрощает развёртывание окружения. В docker-compose обычно описывают сервисы: php-fpm, nginx, mysql. Volumes монтируют код, сети связывают контейнеры. После этого достаточно docker compose up -d.",
        'image' => null,
        'categories' => ['Технологии'],
        'views' => 85,
    ],
    [
        'title' => 'Smarty: шаблоны без боли',
        'description' => 'Зачем использовать Smarty и как организовать шаблоны в небольшом проекте.',
        'body' => "Smarty отделяет логику от представления. Шаблоны поддерживают наследование, блоки и плагины. Это удобно для проектов без тяжёлых фреймворков.",
        'image' => null,
        'categories' => ['Технологии'],
        'views' => 64,
    ],
    [
        'title' => 'PDO и безопасные запросы',
        'description' => 'Почему prepared statements важны и как с ними работать.',
        'body' => "PDO — стандартный способ работы с БД в PHP. Всегда используйте подготовленные выражения. Не подставляйте пользовательский ввод в SQL напрямую.",
        'image' => null,
        'categories' => ['Технологии'],
        'views' => 55,
    ],
    [
        'title' => 'REST API на чистом PHP',
        'description' => 'Минимальный API без фреймворка: роутинг, JSON, коды ответа.',
        'body' => "Front controller принимает запрос, роутер выбирает обработчик. Ответ отдаём в JSON с корректным Content-Type и HTTP-кодом.",
        'image' => null,
        'categories' => ['Технологии'],
        'views' => 42,
    ],
    [
        'title' => 'Выходные в Стамбуле',
        'description' => 'Короткий гид: что посмотреть за два дня в Стамбуле.',
        'body' => "Стамбул — город на стыке Европы и Азии. Обязательно: Айя-София, Голубая мечеть, Гранд-базар, прогулка по Босфору. Еда: кебаб, баклава, турецкий чай.",
        'image' => null,
        'categories' => ['Путешествия'],
        'views' => 210,
    ],
    [
        'title' => 'Пешком по Карпатам',
        'description' => 'Маршрут на выходные в горах: подготовка и советы.',
        'body' => "Карпаты подходят и новичкам, и опытным туристам. Берите удобную обувь, дождевик и запас воды. Погода меняется быстро — лучше перестраховаться.",
        'image' => null,
        'categories' => ['Путешествия', 'Спорт'],
        'views' => 95,
    ],
    [
        'title' => 'Токио за неделю',
        'description' => 'Районы, транспорт и еда — практический чеклист.',
        'body' => "Токио огромен, но метро покрывает почти всё. Стоит побывать в Сибуе, Асакусе, Одайбе. Suica/Pasmo упрощают оплату проезда.",
        'image' => null,
        'categories' => ['Путешествия'],
        'views' => 160,
    ],
    [
        'title' => 'Барселона: Гауди и море',
        'description' => 'Маршрут по главным достопримечательностям Барселоны.',
        'body' => "Саграда Фамилия, Парк Гуэль, Готический квартал, Барселонета. Метро и автобусы удобны; карта Hola Barcelona экономит деньги.",
        'image' => null,
        'categories' => ['Путешествия'],
        'views' => 130,
    ],
    [
        'title' => 'Паста карбонара по-римски',
        'description' => 'Классический рецепт без сливок: только яйца, гуанчиале и пекорино.',
        'body' => "Настоящая карбонара не содержит сливок. Ингредиенты: спагетти, гуанчиале, яйца, пекорино романо, чёрный перец. Главное — не перегреть соус, иначе яйца свернутся.",
        'image' => null,
        'categories' => ['Еда'],
        'views' => 340,
    ],
    [
        'title' => 'Домашний хлеб на закваске',
        'description' => 'Базовый рецепт и частые ошибки новичков.',
        'body' => "Закваска требует времени и внимания. Кормите её регулярно, используйте весы, не бойтесь экспериментировать с мукой.",
        'image' => null,
        'categories' => ['Еда'],
        'views' => 150,
    ],
    [
        'title' => 'Борщ: семейный рецепт',
        'description' => 'Наваристый борщ со свеклой и сметаной.',
        'body' => "Свеклу можно запечь или потушить отдельно — так цвет ярче. Не забывайте про уксус или лимон в конце.",
        'image' => null,
        'categories' => ['Еда'],
        'views' => 200,
    ],
    [
        'title' => 'Чёрные дыры простыми словами',
        'description' => 'Что такое горизонт событий и почему свет не может вырваться.',
        'body' => "Чёрная дыра — область пространства с экстремальной гравитацией. Горизонт событий — граница, за которой даже свет не может уйти.",
        'image' => null,
        'categories' => ['Наука'],
        'views' => 280,
    ],
    [
        'title' => 'Как работает CRISPR',
        'description' => 'Кратко о технологии редактирования генома.',
        'body' => "CRISPR-Cas9 позволяет точечно изменять ДНК. Система находит нужный участок и разрезает его.",
        'image' => null,
        'categories' => ['Наука', 'Технологии'],
        'views' => 175,
    ],
    [
        'title' => 'Квантовые компьютеры: мифы и реальность',
        'description' => 'Чем кубит отличается от бита и где уже применяют квантовые системы.',
        'body' => "Квантовые компьютеры не заменяют обычные — они решают узкий класс задач. Суперпозиция и запутанность — основа их силы.",
        'image' => null,
        'categories' => ['Наука', 'Технологии'],
        'views' => 145,
    ],
    [
        'title' => 'Утренние пробежки: с чего начать',
        'description' => 'План на первые две недели для тех, кто давно не бегал.',
        'body' => "Не нужно сразу бежать 10 км. Чередуйте ходьбу и лёгкий бег. Следите за пульсом.",
        'image' => null,
        'categories' => ['Спорт'],
        'views' => 90,
    ],
    [
        'title' => 'Силовые тренировки дома',
        'description' => 'Базовый комплекс без оборудования.',
        'body' => "Отжимания, приседания, планка, подтягивания. 3–4 раза в неделю достаточно для прогресса.",
        'image' => null,
        'categories' => ['Спорт'],
        'views' => 110,
    ],
    [
        'title' => 'Растяжка после тренировки',
        'description' => 'Простые упражнения на 10 минут.',
        'body' => "Растяжка снижает риск травм и улучшает восстановление. Дышите ровно, не делайте рывков.",
        'image' => null,
        'categories' => ['Спорт'],
        'views' => 70,
    ],
];

foreach ($articles as $data) {
    $catIds = [];
    foreach ($data['categories'] as $catName) {
        $catIds[] = $categoryIds[$catName];
    }

    $id = Article::create(
        $data['title'],
        $data['description'],
        $data['body'],
        $data['image'],
        $catIds
    );

    $stmt = $pdo->prepare('UPDATE articles SET views = ? WHERE id = ?');
    $stmt->execute([$data['views'], $id]);

    $daysAgo = random_int(0, 60);
    $stmt = $pdo->prepare('UPDATE articles SET created_at = DATE_SUB(NOW(), INTERVAL ? DAY) WHERE id = ?');
    $stmt->execute([$daysAgo, $id]);

    echo "  Article: {$data['title']} (#{$id}) \n";
}

echo "Done. Categories: " . count($categoryIds) . ", Articles: " . count($articles) . "\n ";
