<!-- nasza zmienia ($conn), zawsze w php dajemy średnik na koniec linii -->
<?php
    $server = "localhost";
    $user = "user";
    $pass = "user";
    $db = "komissamochodowy";

    if(isset($_GET['dodaj'])) {
        $arrAuto = array(
            'marka'         => $_GET['marka'],
            'model'         => $_GET['model'],
            'przebieg'      => $_GET['przebieg'],
            'kolor'         => $_GET['kolor'],
            'opis'          => $_GET['opis'],
            'rok_produkcji' => $_GET['rok_produkcji']
        );
    }
?>
    


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie aut do bazy danych</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header>
    <h2>Dodaj auto</h2>
    <?php require ('menu.php');
        ?>
    </header>

    <form action="add.php" method="get">
        <div>
            <label>Marka:</label>
            <input type="text" name="marka" id="marka">
        </div>
        <div>
            <label>Model:</label>
            <input type="text" name="model" id="model">
        </div>
        <div>
            <label>Przebieg:</label>
            <input type="number" name="przebieg" id="przebieg">
        </div>
        <div>
            <label>Kolor:</label>
            <input type="text" name="kolor" id="kolor">
        </div>
        <div>
            <label>Opis:</label>
            <input type="opis" name="opis" id="opis">
        </div>
        <div>
            <label>Rok produkcji:</label>
            <select name="rok_produkcji" id="rok_produkcji">
                <?php
                for ($i=2025; $i>=1990 ; $i--) { 
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
        </div>
        <input type="submit" value="dodaj auto" name="dodaj" id="dodaj">
    </form>

<?php 
    if(!($conn = mysqli_connect($server, $user, $pass, $db)
    )){
        echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    } else{
    }   
?>

    <h2>
    <?php
        if(isset($_GET['dodaj'])) {
        $sqlAddQuery ="INSERT INTO samochody (marka, model, przebieg, kolor, opis, rok_produkcji) 
        VALUES ('$arrAuto[marka]', '$arrAuto[model]', '$arrAuto[przebieg]', '$arrAuto[kolor]', '$arrAuto[opis]', '$arrAuto[rok_produkcji]')";
        mysqli_query($conn, $sqlAddQuery);
    }
    ?>
   <h2>Dodano auto.</h2>
</body>
</html>