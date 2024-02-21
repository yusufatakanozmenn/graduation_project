<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>SineVizyon</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
    include "connection.php";
    $sql = "SELECT * FROM movieTable ORDER BY movieID DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    $latestMovie = mysqli_fetch_array($result);
    ?>

    <script>
    // PHP'den alınan veriyi JavaScript'e aktar
    var latestMovie = <?php echo json_encode($latestMovie); ?>;

    window.onload = function() {
        // Eğer 'hideAlert' cookie'si yoksa veya 'false' ise, alert'i göster
        if (!getCookie('hideAlert') || getCookie('hideAlert') === 'false') {
            Swal.fire({
                title: 'Yeni Vizyonda',
                html: '<h3>' + latestMovie.movieTitle + '</h3><br>' +
                    '<img src="' + latestMovie.movieImg + '" width="250px">',

                showCancelButton: true,
                confirmButtonText: 'Rezervasyon Yap',
                cancelButtonText: 'Bir daha gösterme',
                confirmButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "booking.php?id=" + latestMovie.movieID;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // 'Bir daha gösterme' butonuna basılırsa, 'hideAlert' cookie'sini 'true' olarak ayarla
                    setCookie('hideAlert', 'true', 7);
                }
            })
        }
    };

    // Cookie almak için bir fonksiyon
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Cookie ayarlamak için bir fonksiyon
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
    </script>


</head>

<body>
    <?php
    include "connection.php";
    $sql = "SELECT * FROM movieTable";
    ?>
    <header></header>


    <div id="home-section-1" class="movie-show-container">
        <h1>Currently Showing</h1>
        <h3>Book a movie now</h3>
        <div class="movies-container">
            <div class="movies-inner-container">
                <?php
        if ($result = mysqli_query($con, $sql)) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                for ($i = 0; $i < $num_rows; $i++) {
                    $row = mysqli_fetch_array($result);
                    echo '<div class="movie-box">';
                    echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                    echo '<div class="movie-info ">';
                    echo '<div class="session-times">09:00 || 12:00 || 15:00 || 18.00 || 21.00</div>';
                    echo '<h3>' . $row['movieTitle'] . '</h3>';
                    echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                    echo '</div>';
                    echo '</div>';
                }
                mysqli_free_result($result);
            } else {
                echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        ?>
            </div>

        </div>
    </div>


    <div id="home-section-2" class="services-section">
        <h1>How it works</h1>
        <h3>3 Simple steps to book your favourit movie!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite movie</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Pay for your tickets</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Pick your seats & Enjoy watching</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>

    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title">Explore new movies</h1>
        <h3>Now showing</h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/atam.png" alt="">
                <div class="trailer-item-info" data-video="xoOzqBkDVH4">
                    <h3>Atatürk</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/kolpaçino.png" alt="">
                <div class="trailer-item-info" data-video="72wlffFUamk">
                    <h3>Kolpaçino</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/genis-aile.jpg" alt="">
                <div class="trailer-item-info" data-video="8PKmIjCSRWs">
                    <h3>Geniş Aile</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/hizli-ve-ofkeli.jpg" alt="">
                <div class="trailer-item-info" data-video="1wiKclwSfGk">
                    <h3>Hızlı Ve Öfkeli 10</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/mutluyuz.png" alt="">
                <div class="trailer-item-info" data-video="BvHSCiUFPpg">
                    <h3>Mutluyuz</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-1.jpg" alt="">
                <div class="trailer-item-info" data-video="Z1BCujX3pw8">
                    <h3>Captain Marvel</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-2.jpg" alt="">
                <div class="trailer-item-info" data-video="OPEfsEaFv_c">
                    <h3>Karmat Bytmrmt</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>

        </div>
        <footer></footer>

        <script src="scripts/jquery-3.3.1.min.js "></script>
        <script src="scripts/script.js "></script>
</body>


</html>