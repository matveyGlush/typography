<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/style-min.css">
    <link rel="stylesheet" href="./css/media.css">
    <script defer type="module" src="js/main.js"></script>
</head>
<?php
    $remote_db_host = 'helios.cs.ifmo.ru';
    $remote_db_port = 5432;
    $db_name = 'studs';
    $db_user = 's338844';
    $db_password = 'Qb4Ixf1x34N1c5zo';

    // Database connection string
    $dsn = sprintf('pgsql:host=helios.cs.ifmo.ru;port=%d;dbname=%s', $remote_db_port, $db_name);

    try {
        // Connect to the PostgreSQL database
        $pdo = new PDO($dsn, $db_user, $db_password);

    } catch (PDOException $e) {
        die("Error connecting to the database: " . $e->getMessage());
    }
?>
<body>
    <header>
        <p class="header__name">Виктор <br> Петрович</p>
        <p class="header__quote">Во имя духовки и противня! Во имя сковородки и половника! Омле-е-е-ет!</p>
    </header>
    <main>
        <section class="hero">
            <div class="hero__title">
                <span>ШЕФ</span>
                <p class="hero__quote">
                    Известный шеф-повар Поль Бокюз однажды сказал: &laquo;Жизнь&nbsp;&mdash; это маленькая кухня, на&nbsp;которой мы&nbsp;готовим блюда под названием &laquo;счастье&raquo;. На&nbsp;этой кухне мы&nbsp;сами себе шеф-повара, и&nbsp;только нам решать, какие ингредиенты мы&nbsp;будем добавлять в&nbsp;наши блюда. Важно помнить, что универсального рецепта нет, поэтому творите, пробуйте что-то новое. И, может быть, тогда, в&nbsp;конце, вас будет ждать награда.
                </p>
            </div>
            <div class="hero__card">
                <div class="hero__card__quote_top">
                    <div class="ticker-wrapper__first-half">
                        <p>
                            Вииииктор Петроооович - шеф поовар от бооога! Слаааався Баринов! Слаааався Баринов! Слаааався Баринов! Во веееки векоооов…
                        </p>
                    </div>
                    <div class="ticker-wrapper__second-half">
                        <p>
                            Вииииктор Петроооович - шеф поовар от бооога! Слаааався Баринов! Слаааався Баринов! Слаааався Баринов! Во веееки векоооов…
                        </p>
                    </div>
                </div>
                <div class="avatar">
                    <img src="./img/chef.png" alt="шеф">
                    <div class="circular">
                        <svg viewBox="0 0 100 100">
                            <path d="M 0,50 a 50,50 0 1,1 0,1 z" id="circle" fill="none"/>
                            <text>
                                <textPath startOffset="0%" xlink:href="#circle">
                                    &#8902; Arcabaleno &#8902;
                                </textPath>
                                <textPath startOffset="35%" xlink:href="#circle">
                                    &#8902; Claude Monet &#8902;
                                </textPath>
                                <textPath startOffset="72%" xlink:href="#circle">
                                    &#8902; Victor &#8902;
                                </textPath>
                            </text>
                            <circle cx="50" cy="50" r="48" fill="none" stroke="black" stroke-width="0.3"/>
                            <circle cx="50" cy="50" r="59" fill="none" stroke="black" stroke-width="0.3"/>
                        </svg>                          
                    </div>
                </div>
                <div class="hero__card__quote_bottom">
                    <div class="ticker-wrapper__first-half">
                        <p>
                            Вииииктор Петроооович - шеф поовар от бооога! Слаааався Баринов! Слаааався Баринов! Слаааався Баринов! Во веееки векоооов…
                        </p>
                    </div>
                    <div class="ticker-wrapper__second-half">
                        <p>
                            Вииииктор Петроооович - шеф поовар от бооога! Слаааався Баринов! Слаааався Баринов! Слаааався Баринов! Во веееки векоооов…
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="transition">
            <span class="where">ГДЕ</span>
            <span class="my">МОЙ</span>
            <span class="knife">НОООООЖ</span>
        </section>
        <section class="quotes">
            <div class="quote-block">
                <div class="quote-block__content">
                    <div>
                        <p class="quote-block__title">
                            Сезон 1
                            <button class="addQuote" data-modalartist="modal-artist" data-animation="fadeInUp" data-speed="200" data-season="1">
                                добавить цитату
                            </button>
                        </p>
                        <ul class="quote-block__list">
                            <?php
                                $quotes = $pdo->query("SELECT * FROM quotes WHERE season=1 ORDER BY episode LIMIT 3")->fetchAll();
                                foreach($quotes as $quote) {
                                    $text = $quote['text'];
                                    $episode = $quote['episode'];
                                    
                                    echo "
                                        <li class='quote-block__list__item'>
                                            $text
                                            <span>[$episode]</span>
                                            <form action='deleteQuote.php' method='POST' class='quote-delete'>
                                                <input value='$id' type='submit' name='id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='100' height='100' viewBox='0 0 24 24'>
                                                    <path d='M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z'></path>
                                                    </svg>
                                                </input>
                                            </form>
                                        </li>
                                    ";
                                };
                            ?>
                            <li class="quote-block__list__item">
                                <a href="season.php?season=1">Читать все цитаты этого сезона...</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="avatar">
                    <img src="./img/chefAngry.png" alt="шеф">
                </div>
            </div>
            <div class="quote-block">
                <div class="quote-block__content">
                    <div>
                        <p class="quote-block__title">
                            Сезон 2
                            <button class="addQuote" data-modalartist="modal-artist" data-animation="fadeInUp" data-speed="200" data-season="2">
                                добавить цитату
                            </button>
                        </p>
                        <ul class="quote-block__list">
                            <?php
                                $quotes = $pdo->query("SELECT * FROM quotes WHERE season=2 ORDER BY episode LIMIT 3")->fetchAll();
                                foreach($quotes as $quote) {
                                    $text = $quote['text'];
                                    $episode = $quote['episode'];
                                    
                                    echo "
                                        <li class='quote-block__list__item'>
                                            $text
                                            <span>[$episode]</span>
                                            <form action='deleteQuote.php' method='POST' class='quote-delete'>
                                                <input value='$id' type='submit' name='id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='100' height='100' viewBox='0 0 24 24'>
                                                    <path d='M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z'></path>
                                                    </svg>
                                                </input>
                                            </form>
                                        </li>
                                    ";
                                };
                            ?>
                            <li class="quote-block__list__item">
                                <a href="season.php?season=2">Читать все цитаты этого сезона...</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="avatar">
                    <img src="./img/chefAngry.png" alt="шеф">
                </div>
            </div>
            <div class="quote-block">
                <div class="quote-block__content">
                    <div>
                        <p class="quote-block__title">
                            Сезон 3
                            <button class="addQuote" data-modalartist="modal-artist" data-animation="fadeInUp" data-speed="200" data-season="3">
                                добавить цитату
                            </button>
                        </p>
                        <ul class="quote-block__list">
                            <?php
                                $quotes = $pdo->query("SELECT * FROM quotes WHERE season=3 ORDER BY episode LIMIT 3")->fetchAll();
                                foreach($quotes as $quote) {
                                    $text = $quote['text'];
                                    $episode = $quote['episode'];
                                    $id = $quote['id'];
                                    
                                    echo "
                                        <li class='quote-block__list__item'>
                                            $text
                                            <span>[$episode]</span>
                                            <form action='deleteQuote.php' method='POST' class='quote-delete'>
                                                <input value='$id' type='submit' name='id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='100' height='100' viewBox='0 0 24 24'>
                                                    <path d='M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z'></path>
                                                    </svg>
                                                </input>
                                            </form>
                                        </li>
                                    ";
                                };
                            ?>
                            <li class="quote-block__list__item">
                                <a href="season.php?season=3">Читать все цитаты этого сезона...</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="avatar">
                    <div></div>
                    <img src="./img/chefHair.png" alt="шеф">
                </div>
            </div>
            <div class="quote-block">
                <div class="quote-block__content">
                    <div>
                        <p class="quote-block__title">
                            Сезон 4
                            <button class="addQuote" data-modalartist="modal-artist" data-animation="fadeInUp" data-speed="200" data-season="4">
                                добавить цитату
                            </button>
                        </p>
                        <ul class="quote-block__list">
                            <?php
                                $quotes = $pdo->query("SELECT * FROM quotes WHERE season=4 ORDER BY episode LIMIT 3")->fetchAll();
                                foreach($quotes as $quote) {
                                    $text = $quote['text'];
                                    $episode = $quote['episode'];
                                    
                                    echo "
                                        <li class='quote-block__list__item'>
                                            $text
                                            <span>[$episode]</span>
                                            <form action='deleteQuote.php' method='POST' class='quote-delete'>
                                                <input value='$id' type='submit' name='id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='100' height='100' viewBox='0 0 24 24'>
                                                    <path d='M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z'></path>
                                                    </svg>
                                                </input>
                                            </form>
                                        </li>
                                    ";
                                };
                            ?>
                            <li class="quote-block__list__item">
                                <a href="season.php?season=4">Читать все цитаты этого сезона...</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="avatar">
                    <img src="./img/chefDrunk.png" alt="шеф">
                </div>
            </div>
            <div class="quote-block">
                <div class="quote-block__content">
                    <div>
                        <p class="quote-block__title">
                            Сезон 5
                            <button class="addQuote" data-modalartist="modal-artist" data-animation="fadeInUp" data-speed="200" data-season="5">
                                добавить цитату
                            </button>
                        </p>
                        <ul class="quote-block__list">
                            <?php
                                $quotes = $pdo->query("SELECT * FROM quotes WHERE season=5 ORDER BY episode LIMIT 3")->fetchAll();
                                foreach($quotes as $quote) {
                                    $text = $quote['text'];
                                    $episode = $quote['episode'];
                                    
                                    echo "
                                        <li class='quote-block__list__item'>
                                            $text
                                            <span>[$episode]</span>
                                            <form action='deleteQuote.php' method='POST' class='quote-delete'>
                                                <input value='$id' type='submit' name='id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='100' height='100' viewBox='0 0 24 24'>
                                                    <path d='M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z'></path>
                                                    </svg>
                                                </input>
                                            </form>
                                        </li>
                                    ";
                                };
                            ?>
                            <li class="quote-block__list__item">
                                <a href="season.php?season=5">Читать все цитаты этого сезона...</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="avatar">
                    <img src="./img/chefWhiskey.png" alt="шеф">
                </div>
            </div>
        </section>
    </main>
    <footer>
        <button id="game">тык</button>
        <h1 id="result">КТО ТЫ ДЛЯ ШЕФА СЕГОДНЯ</h1>
    </footer>

    <div class="modal">
        <div class="modal__container" data-target="modal-artist">
            <button class="modal-close"></button>
            <form action="addQuote.php" method="POST" class="modal-content">
                <input id="season" name="season" class="modal-season" type="number">

                <label class="modal-label" for="episode">Серия</label>
                <input name="episode" class="modal-input" id="episode" type="number">

                <label class="modal-label" for="quote">Цитата</label>
                <textarea name="quote" class="modal-input modal-textarea" id="quote" type="text"></textarea>

                <button class="modal-submit" type="submit" name="submit">сохранить</button>
            </form>
        </div>
    </div>
</body>
</html>