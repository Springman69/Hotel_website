<?php
session_start();

if(!isset($_SESSION['username'])) {
    header('Location: logowanie.html');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_reservations'])) {
        $user = $_SESSION['username']; 
        $sql = "DELETE FROM rezerwacja WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);

        if ($stmt->execute() === TRUE) {
            echo "Wszystkie twoje rezerwacje zostały usunięte: ";
        } else {
            echo "Błąd: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $arrival = $_POST['arrival'];
        $departure = $_POST['departure'];
        $room_type = $_POST['room-type'];
        $guests = $_POST['guests'];
        $user = $_SESSION['username']; 

        $sql = "INSERT INTO rezerwacja (username, name, email, phone, arrival, departure, room_type, guests)
            VALUES ('$user', '$name', '$email', '$phone', '$arrival', '$departure', '$room_type', '$guests')";

        if ($conn->query($sql) === TRUE) {
            echo "Rezerwacja została dodana pomyślnie: ";
        } else {
            echo "Błąd: " . $sql . "<br>" . $conn->error;
        }
    }
}


$sql = "SELECT * FROM rezerwacja WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Rezerwacja: Imię i nazwisko: " . $row["name"]. " - E-mail: " . $row["email"]. " - Telefon: " . $row["phone"]. " - Data przyjazdu: " . $row["arrival"]. " - Data wyjazdu: " . $row["departure"]. " - Typ pokoju: " . $row["room_type"]. " - Liczba gości: " . $row["guests"]. "<br>";
    }
} else {
    echo "Brak rezerwacji";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Opis strony hotelowej">
    <title>Rezerwacja pokojów - Hotel Restwel</title>
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
        <h1>Rezerwacja</h1>
        <p>Proszę wypełnić poniższy formularz, aby dokonać rezerwacji:</p>
    
        <form id="reservation-form" action="pokoje.php" method="post" > 
            <label for="name">Imię i nazwisko:</label>
            <input type="text" id="name" name="name" required>
    
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
    
            <label for="phone">Telefon:</label>
            <input type="tel" id="phone" name="phone" required>
    
            <label for="arrival">Data przyjazdu:</label>
            <input type="date" id="arrival" name="arrival" required>
    
            <label for="departure">Data wyjazdu:</label>
            <input type="date" id="departure" name="departure" required>
    
            <label for="room-type">Typ pokoju:</label>
            <select id="room-type" name="room-type" required>
                <option value="">--Wybierz typ pokoju--</option>
                <option value="single">Pojedynczy</option>
                <option value="double">Podwójny</option>
                <option value="suite">Apartament</option>
            </select>
    
            <label for="guests">Liczba gości:</label>
            <input type="number" id="guests" name="guests" min="1" max="10" required>
    
            <input type="submit" value="Rezerwuj">
        </form>

            <form id="delete-reservations-form" action="pokoje.php" method="post">
                <input type="hidden" name="delete_reservations" value="1">
                <input type="submit" value="Usuń wszystkie rezerwacje">
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