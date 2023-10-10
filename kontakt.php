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
    <title>Kontakt - Hotel Restwel</title>
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
        <h1>Kontakt</h1>
        <p>Skontaktuj się z nami, wypełniając poniższy formularz:</p>
    
        <form id="contact-form" action="send_email.php" method="post">
    <label for="name">Imię i nazwisko:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="subject">Temat:</label>
    <input type="text" id="subject" name="subject" required>

    <label for="message">Wiadomość:</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <input type="submit" value="Wyślij">
</form>

    </main>
    
    <footer>
        <p>&copy; 2023 Hotel Restwel. Wszelkie prawa zastrzeżone. Marcel Kalemba</p>
        <ul>
            <li><a href="https://www.facebook.com/hotelRestwel" target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/hotelRestwel" target="_blank">Instagram</a></li>
            <li><a href="https://www.twitter.com/hotelRestwel" target="_blank">Twitter</a></li>
        </ul>
        <div class="centered-container">
            <button id="show-date">Pokaż aktualną datę</button>
            <button id="change-background-color">Zmień kolor tła</button>
            <button id="scroll-to-top">Przewiń do góry</button>
        </div>
    </footer>
</body>
</html>    