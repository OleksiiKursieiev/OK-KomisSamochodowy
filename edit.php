<?php
$server = "localhost";
$user = "user";
$pass = "user";
$db = "komissamochodowy";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    echo "<h1 class='error'>Błąd połączenia z bazą danych.</h1>";
    exit();
}

if (isset($_POST['submit']) && isset($_POST['id_samochodu'])) {
    $id = $_POST['id_samochodu'];
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rok_produkcji = $_POST['rok_produkcji'];
    $kolor = $_POST['kolor'];
    $przebieg = $_POST['przebieg'];
    $opis = $_POST['opis'];
    $sql = "UPDATE samochody SET 
                marka = '$marka', 
                model = '$model', 
                rok_produkcji = '$rok_produkcji', 
                kolor = '$kolor', 
                przebieg = '$przebieg', 
                opis = '$opis'
            WHERE id_samochodu = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<h3 class='success'>Dane zostały zaktualizowane pomyślnie.</h3>";
    } else {
        echo "<h3 class='error'>Błąd podczas aktualizacji danych: " . mysqli_error($conn) . "</h3>";
    }
}

if (isset($_POST['id_samochodu'])) {
    $id = $_POST['id_samochodu'];
    $sql = "SELECT * FROM samochody WHERE id_samochodu = $id";
    $res = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($res);
}

mysqli_close($conn);
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

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="edit.php" method="post" class="row g-3">
                <input type="hidden" name="id_samochodu" value="<?php echo $item['id_samochodu']; ?>">

                <div class="col-md-4">
                  <label for="marka" class="form-label">Marka</label>
                    <input type="text" class="form-control" id="marka" name="marka" value="<?php echo $item['marka'] ?? ''; ?>">
                </div>

                <div class="col-md-4">
                  <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" value="<?php echo $item['model'] ?? ''; ?>">
                </div>

                <div class="col-md-4">
                  <label for="rok_produkcji" class="form-label">Rok produkcji</label>
                    <input type="text" class="form-control" id="rok_produkcji" name="rok_produkcji" value="<?php echo $item['rok_produkcji'] ?? ''; ?>">
                </div>

                <div class="col-md-4">
                  <label for="kolor" class="form-label">Kolor</label>
                    <input type="text" class="form-control" id="kolor" name="kolor" value="<?php echo $item['kolor'] ?? ''; ?>">
                </div>

                <div class="col-md-4">
                  <label for="przebieg" class="form-label">Przebieg</label>
                    <input type="text" class="form-control" id="przebieg" name="przebieg" value="<?php echo $item['przebieg'] ?? ''; ?>">
                </div>

                <div class="col-md-12">
                  <label for="opis" class="form-label">Opis</label>
                    <textarea name="opis" id="opis" class="form-control"><?php echo $item['opis'] ?? ''; ?></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="submit">Zmodyfikuj opis</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>