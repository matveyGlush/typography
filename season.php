<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>season</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/style.css">
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

    $season = $_GET["season"];
?>
<body>
    <header>
        <p class="header__name"><a href="main.php">&lt; НАЗАД</a></p>
        <p class="header__quote">Во имя духовки и противня! Во имя сковородки и половника! Омле-е-е-ет!</p>
    </header>
    <section class="quotes">
        <div class="quote-block">
            <div class="quote-block__content">
                <div>
                    <p class="quote-block__title">
                        Сезон <?php echo "<span>$season</span>"; ?>
                        <button class="addQuote" data-modalartist="modal-artist" data-animation="fadeInUp" data-speed="200" data-season="1">
                                добавить цитату
                        </button>
                    </p>
                    <ul class="quote-block__list">
                        <?php
                            $quotes = $pdo->query("SELECT * FROM quotes WHERE season=$season ORDER BY episode")->fetchAll();
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
                    </ul>
                </div>
            </div>
            <div class="avatar">
                <img src="./img/chefWhiskey.png" alt="шеф">
            </div>
        </div>
    </section>

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