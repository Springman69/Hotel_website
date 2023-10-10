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
    <title>Strona główna - Hotel Restwel</title>
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
    <main>
        <h1>Witamy w Hotelu Restwel!</h1>
<p><strong>Hotel Restwel</strong> znajduje się w sercu miasta, oferując <em>luksusowe pokoje</em> i doskonałą obsługę. Zapraszamy do zapoznania się z naszą ofertą!</p>
<h2>Galeria Klinkij na zdjęcie aby powiększyć</h2>
<div class="gallery-container">
    <div class="gallery-item">
        <img src="1.jpg" alt="Zdjęcie hotelu" class="hotel-image" onclick="openLightbox(this);">
    </div>
    <div class="gallery-item">
        <img src="2.jpg" alt="Zdjęcie hotelu" class="hotel-image" onclick="openLightbox(this);">
    </div>
    <div class="gallery-item">
        <img src="3.jpg" alt="Zdjęcie hotelu" class="hotel-image" onclick="openLightbox(this);">
    </div>
    <div class="gallery-item">
        <img src="4.jpg" alt="Zdjęcie hotelu" class="hotel-image" onclick="openLightbox(this);">
    </div>
    <div class="gallery-item">
        <img src="5.jpg" alt="Zdjęcie hotelu" class="hotel-image" onclick="openLightbox(this);">
    </div>
</div>
<div id="modal" class="modal">
    <img src="#" alt="Zdjęcie hotelu w trybie pełnoekranowym" class="modal-content" id="modal-img">
</div>
    <h2>Usługi</h2>
    <div class="clickable, center-content" onclick="showServiceDetails(this, 'Bezpłatne Wi-Fi', 'Dostępne w całym hotelu.')">
        Bezpłatne Wi-Fi
    </div>
    <div class="clickable, center-content" onclick="showServiceDetails(this, 'Restauracja z lokalnymi specjałami', 'Ceny od 30 zł.')">
        Restauracja z lokalnymi specjałami
    </div>
    <div class="clickable, center-content" onclick="showServiceDetails(this, 'Centrum fitness', 'Koszt: 20 zł za godzinę.')">
        Centrum fitness
    </div>
    <div class="clickable, center-content" onclick="showServiceDetails(this, 'Spa i wellness', 'Pakiet spa: 200 zł.')">
        Spa i wellness
    </div>
    <div class="clickable, center-content" onclick="showServiceDetails(this, 'Parking', 'Bezpłatny dla gości hotelowych.')">
        Parking
    </div>
    <h2 style="text-align: center;">Lokalizacja</h2>
    <div class="center-content">
        <address>
            Hotel Restwel<br>
            Ulica Wojska Polskiego<br>
            98-300 Wieluń
        </address>
       <div class="google-map">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.339832220979!2d18.583893077061802!3d51.23123597175192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471a7f41a0d1e78f%3A0x3304dd1a0fb323d3!2sGala%20Poland%20Sp%20z%20o.o.!5e0!3m2!1spl!2spl!4v1696939366713!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </div>
        <h2>Tabela cen</h2>
        <table>
            <tr>
                <th>Rodzaj pokoju</th>
                <th>Cena za noc</th>
            </tr>
            <tr>
                <td class="clickable" onclick="showServiceDetails(this, 'Pokój jednoosobowy', 'Wyposażenie: łóżko pojedyncze, TV, minibar, bezpłatne WiFi.')">Pokój jednoosobowy</td>
                <td>200 zł</td>
            </tr>
            <tr>
                <td class="clickable" onclick="showServiceDetails(this, 'Pokój dwuosobowy', 'Wyposażenie: łóżko podwójne, TV, minibar, bezpłatne WiFi.')">Pokój dwuosobowy</td>
                <td>300 zł</td>
            </tr>
            <tr>
                <td class="clickable" onclick="showServiceDetails(this, 'Apartament', 'Wyposażenie: sypialnia, salon, TV, minibar, bezpłatne WiFi, jacuzzi.')">Apartament</td>
                <td>500 zł</td>
            </tr>
        </table>
        
    </main>
    <footer>
        <button id="change-background-color">Zmień kolor tła</button>
        <button id="show-date">Pokaż aktualną datę</button>
        <button id="scroll-to-top">Przewiń do góry</button>
        <p>&copy; 2023 Hotel Restwel. Wszelkie prawa zastrzeżone. Marcel Kalemba</p>
        <ul>
            <li><a href="https://www.facebook.com/hotelRestwel" target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/hotelRestwel" target="_blank">Instagram</a></li>
            <li><a href="https://www.twitter.com/hotelRestwel" target="_blank">Twitter</a></li>
        </ul>
    </footer>
</body>
</html>