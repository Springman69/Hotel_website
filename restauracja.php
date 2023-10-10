<?php
session_start();

if(!isset($_SESSION['username'])) {
    header('Location: logowanie.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Opis strony hotelowej">
    <title>Restauracja - Hotel Restwel</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
<header>
    <div class="gallery-item">
        <img src="logo.jpg" alt="Logo Hotelu Restwel" class="hotel-logo">
    </div>
    
    <nav>
        <ul>
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="pokoje.php">Rezerwacja pokojów</a></li>
                <li><a href="restauracja.php">Restauracja</a></li>
                <li><a href="atrakcje.php">Atrakcje</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
                <li><a href="logowanie.html">Logowanie</a></li>
                <li><a href="rejestracja.html">Rejestracja</a></li>
        </ul>
    </nav>
    <div>
                <?php
            if (isset($_SESSION['username'])) {
                echo "Witaj, " . $_SESSION['username'] . "!<br>";
                echo '<a href="logout.php">Wyloguj się</a>';
            }
?>

        </div>
</header>

<main class="main-container">
    <h1>Restauracja</h1>
    <p>Nasza restauracja oferuje szeroki wybór dań kuchni śródziemnomorskiej oraz tradycyjnej kuchni polskiej.</p>
    
    <h2>Menu</h2>
    <ul class="menu-list">
        <li onmouseover="changeImage('kebab.jpg')">Danie dnia: Kebab</li>
        <li onmouseover="changeImage('rosół.jpg')">Rosół</li>
        <li onmouseover="changeImage('stek.jpg')">Stek z antrykota panierowany w winie z 1754 roku</li>
        <li onmouseover="changeImage('frytasy.png')">Frytki z ziemniaków z Kambodży</li>
    </ul>
    <img id="menu-image" src="img1.jpg" alt=" " class="menu-image">
</main>

<footer>
    <p>&copy; 2023 Hotel Restwel. Wszelkie prawa zastrzeżone. Marcel Kalemba</p>
    <div class="centered-container">
        <button id="show-date">Pokaż aktualną datę</button>
        <button id="change-background-color">Zmień kolor tła</button>
        <button id="scroll-to-top">Przewiń do góry</button>
    </div>
    <ul>
        <li><a href="https://www.facebook.com/hotelRestwel" target="_blank">Facebook</a></li>
        <li><a href="https://www.instagram.com/hotelRestwel" target="_blank">Instagram</a></li>
        <li><a href="https://www.twitter.com/hotelRestwel" target="_blank">Twitter</a></li>
    </ul>
</footer>
</body>
</html>