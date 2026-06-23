<?php

$server = "localhost";
$user = "user";
$pass = "user";
$db = "komissamochodowy";

    if (isset($_POST['id_samochodu'])) {
    echo $_POST['id_samochodu'];
    if (!($conn = mysqli_connect($dane['server'],$dane['user'],$dane['pass'],$dane['db']))){
            echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    }
    else {
    
}
}
?>
    


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifikacja aut z bazy danych</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header>
    <h2>Modifikuj auto</h2>
    <?php require ('menu.php');
        ?>
    </header>
    <section>

<div class="container">
    <div class="row">
        <div class="col-12">
       
  <table class="table table-striped-columns">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Marka</th>
      <th scope="col">Model</th>
      <th scope="col">Rok produkcji</th>
      <th scope="col">Przebieg</th>
      <th scope="col">Cena</th>
      <th scope="col">Kolor</th>
      <th scope="col">Opis</th>
      <th scope="col">Modifikuj</th>
    </tr>
</thead>
    <tbody>
    <?php 
    if(!($conn = mysqli_connect($server, $user, $pass, $db)
    )){
        echo "<h1 class=\"error\">Błąd połączenia z bazą danych.</h1>";                     
    } else{
    
        $sql = "SELECT * FROM samochody INNER JOIN skup ON samochody.id_samochodu = skup.id_samochodu;";
        $res = mysqli_query($conn, $sql);
        foreach ($res as $item) { 
            echo '<tr>';
            echo 
            '<th>' . $item['id_samochodu'] . "</th>"
            . '<th>' . $item['marka'] . '</th>'
            . '<th>' . $item['model'] . "</th>"
            . '<th>' . $item['rok_produkcji'] . "</th>"
            . '<th>' . $item['przebieg']  . "</th>"
            . '<th>' . $item['cena_kupna']*1.20 . " zł" . "</th>"
            . '<th>' . $item['kolor'] . "</th>"
            . '<th>' . $item['opis'] . "</th>";
            echo '<th>';
            echo "<form action=\"edit.php\" method=\"post\">";
            echo "<input type=\"text\" value=" . $item['id_samochodu'] . " name=\"id_samochodu\" hidden>";
            echo "<input type=\"submit\" value=\"edytuj auto\" class=\"btn btn-primary\">";
            echo "</form>"; ;
            echo '</tr>';
        }
    }
    ?>
  </tbody>
</table>

</div>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>