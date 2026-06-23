<!-- nasza zmienia ($conn), zawsze w php dajemy średnik na koniec linii -->
<?php
    $server = "localhost";
    $user = "user";
    $pass = "user";
    $db = "komissamochodowy";

    if(isset($_GET['szukaj'])) {
        $arrAuto = array(
            'marka'         => $_GET['marka'],
            'model'         => $_GET['model'],
            'przebieg'      => $_GET['przebieg'],
            'kolor'         => $_GET['kolor'],
            'opis'          => $_GET['opis'],
            'rok_produkcji' => $_GET['rok_produkcji']
        );
        echo $arrAuto['marka'];
        echo $arrAuto['model'];
        echo $arrAuto['przebieg'];
        echo $arrAuto['kolor'];
        echo $arrAuto['opis'];
        echo $arrAuto['rok_produkcji'];
    }
?>
    


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis samochodowy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header>
        <h1> Strona główna </h1>
        <?php require ('menu.php');
        ?>
    </header>
<?php 
    if(!($conn = mysqli_connect($server, $user, $pass, $db)
    )){
        echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    } else{
    }
?>

    <h2>
    <?php
        $sql = "SELECT * FROM samochody INNER JOIN skup ON samochody.id_samochodu = skup.id_samochodu;";
        $res = mysqli_query($conn, $sql); // Wykonanie tego zapytania
        foreach ($res as $item) { // pętla 
            echo "Marka: " . $item['marka'] . "<br>"
            . "Model: " . $item['model'] . "<br>"
            . "Rok produkcji: " . $item['rok_produkcji'] . "<br>"
            . "Przebieg: " . $item['przebieg']  . "<br>"
            . "Cena: " . $item['cena_kupna']*1.20 . " zł" . "<br>" . "<br>";
        }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>