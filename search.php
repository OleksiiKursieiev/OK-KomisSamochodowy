<?php
    $dane = array(
    'server' => "localhost",
    'user' => "user",
    'pass' => "user",
    'db' => "komissamochodowy"
    );

    if (isset($_GET['szukaj'])) {
    $arrAuto = array(
            'marka'         => $_GET['marka'],
            'model'         => $_GET['model'],
            'przebieg1'      => $_GET['przebieg1'],
            'przebieg2'      => $_GET['przebieg2'],
            'kolor'         => $_GET['kolor'],
            'rok_produkcji1' => $_GET['rok_produkcji1'],
            'rok_produkcji2' => $_GET['rok_produkcji2']
    );
    if($arrAuto['przebieg1'] =='') $arrAuto['przebieg1'] = 0;
    if($arrAuto['przebieg2'] =='') $arrAuto['przebieg2'] = 10000;
    if (!($conn = mysqli_connect($dane['server'],$dane['user'],$dane['pass'],$dane['db']))){
            echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    }
    else {
    mysqli_close($conn);
}
}
?>  

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header>
        <h2>Szukaj auto</h2>
        <?php require ('menu.php');
        ?>
    </header>

    <form action="search.php" method="get">
        <div>
            <label>Marka:</label>
            <input type="text" name="marka" id="marka">
        </div>
        <div>
            <label>Model:</label>
            <input type="text" name="model" id="model">
        </div>
        <div>
            <label>Przebieg min:</label>
            <input type="number" name="przebieg1" id="przebieg1">
        </div>
        <div>
            <label>Przebieg max:</label>
            <input type="number" name="przebieg2" id="przebieg2">
        </div>
        <div>
            <label>Kolor:</label>
            <input type="text" name="kolor" id="kolor">
        </div>
        <div>
            <label>Rok produkcji od:</label>
            <select name="rok_produkcji1" id="rok_produkcji1">
            <option value="0">0<option>
                <?php
                for ($i=2025; $i>=1990 ; $i--) { 
                    echo "<option value=\"$i\">$i<option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label>Rok produkcji do:</label>
            <select name="rok_produkcji2" id="rok_produkcji2">
                <option value="0">0<option>
                <?php
                for ($i=2025; $i>=1990 ; $i--) { 
                    echo "<option value=\"$i\">$i<option>";
                }
                ?>

            </select>
        </div>
        <input type="submit" value="Szukaj auto" name="szukaj" id="szukaj">
    </form>
   <h2>Samochody znalezione:</h2>
<?php 
    if (!($conn = mysqli_connect($dane['server'],$dane['user'],$dane['pass'],$dane['db']))){
        echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    } else{
    }   
?>

    <h2>
    <?php
        if(isset($_GET['szukaj'])) {
        $sqlSelQuery ="SELECT * FROM samochody WHERE samochody.marka LIKE '$arrAuto[marka]' 
        OR samochody.przebieg BETWEEN $arrAuto[przebieg1] AND $arrAuto[przebieg2]
        OR samochody.rok_produkcji BETWEEN $arrAuto[rok_produkcji1] AND $arrAuto[rok_produkcji2]
        OR samochody.model LIKE '$arrAuto[model]'
        OR samochody.kolor LIKE '$arrAuto[kolor]';";
        $res = mysqli_query($conn, $sqlSelQuery);
        foreach ($res as $item) { // pętla 
            echo $item['id_samochodu'] . " " . $item['marka'] . " " . $item['model']. " " . "Przebieg:" . $item['przebieg']  . " " .$item['kolor'] . " " . "Rok prdocukji:" . $item['rok_produkcji'] . "<br>";
        }
    }
    ?>
</body>
</html>