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

            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])) {
                $id = $_POST['id'];
                
                $result = $pdo->exec("DELETE FROM quotes WHERE id=$id");

                echo "success";
            }

            header('Location: https://se.ifmo.ru/~s338844/typography/main.php');
            die();

        } catch (PDOException $e) {
            die("Error connecting to the database: " . $e->getMessage());
        }
?>