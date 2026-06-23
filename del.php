<?php

$dane = array(
    'server' => "localhost",
    'user' => "user",
    'pass' => "user",
    'db' => "komissamochodowy"
);


    if (isset($_POST['id_samochodu'])) {
    echo $_POST['id_samochodu'];
    if (!($conn = mysqli_connect($dane['server'],$dane['user'],$dane['pass'],$dane['db']))){
            echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    }
    else {
    $id = $_POST['id_samochodu'];
    $querySelect = "DELETE FROM samochody WHERE id_samochodu = $id";
    mysqli_query($conn, $querySelect);
    mysqli_close($conn);
}
}
?>
    


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuwanie aut z bazy danych</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header>
        <nav>
        <h1>Usuń auto</h1>
        <?php require ('menu.php');
        ?>
        </nav>
    </header>
    <section>
        <?php
        if (!($conn = mysqli_connect($dane['server'],$dane['user'],$dane['pass'],$dane['db']))){
            echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    }else {
        $querySelect = "SELECT * FROM samochody;";
        $res = mysqli_query($conn, $querySelect);
        foreach ($res as $item) { // pętla 
            echo $item['id_samochodu'] . " " . $item['marka'] . " " . $item['model'] . " " . $item['kolor'];
            echo "<form action=\"del.php\" method=\"post\">";
            echo "<input type=\"text\" value=" . $item['id_samochodu'] . " name=\"id_samochodu\" hidden>";
            echo "<input type=\"submit\" value=\"usuń auto\">";
            echo "</form>";
            echo "<br>";
        }
        mysqli_close($conn);
    }
        ?>
    </section>

</body>
</html>