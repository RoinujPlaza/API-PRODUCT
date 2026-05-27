    <?php


        $host = "localhost";
        $db   = "productdb";
        $user = "root";
        $pass = "";
        $connection = new mysqli($host, $user, $pass, $db);

        if ($connection->connect_error) {
            die(json_encode(["error" => "Database connection failed"]));
        }


    ?>
