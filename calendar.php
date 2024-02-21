<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Cinema Calendar</title>
    <link rel="icon" type="image/png" href="img/logo.png">

    <style>
    .container {
        padding-left: 20px;
        padding-right: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    .film {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .film img {
        width: 100px;
        height: auto;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        margin-right: 10px;
    }

    .film p {
        margin: 0;
    }
    </style>

</head>

<body>
    <?php
include "connection.php";

// Tüm filmleri çek
$movieQuery = "SELECT * FROM movieTable";
$result = mysqli_query($con, $movieQuery);

// Filmleri tarihlerine göre gruplandır
$films = [];
while ($row = mysqli_fetch_array($result)) {
    $date = $row['movieRelDate']; // Filmin gösterim tarihi
    $title = $row['movieTitle']; // Film adı
    $img = $row['movieImg']; // Film resmi

    // Bu tarih için bir film listesi oluştur
    if (!isset($films[$date])) {
        $films[$date] = [];
    }

    // Filmi listeye ekle
    $films[$date][] = ['title' => $title, 'img' => $img];
}

$currentDate = date('Y-m-d');
?>

    <header></header>
    <div class="container">
        <h1 class="my-4">Movie Schedule</h1>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Movies</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $date => $filmsOnDate): ?>
                <tr>
                    <td><?php echo $date; ?></td>
                    <td>
                        <?php foreach ($filmsOnDate as $film): ?>
                        <div class="film">

                            <img src="<?php echo $film['img']; ?>" alt="<?php echo $film['title']; ?>">
                            <p><?php echo $film['title']; ?></p>

                        </div>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>


</html>