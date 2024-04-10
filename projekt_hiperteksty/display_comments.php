<?php
// Połączenie z bazą danych
$conn = new mysqli('localhost', 'root', '', 'starwarsdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Usunięcie komentarza
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM comments WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Komentarz został usunięty pomyślnie.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Zapisywanie komentarza do bazy danych
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO comments (name, comment, date) VALUES ('$name', '$comment', '$date')";
    if ($conn->query($sql) === TRUE) {
       // echo "Komentarz został dodany pomyślnie.";
    } else {
        echo "Nie udało sie dodać komentarza.Kod błędu: " . $sql . "<br>" . $conn->error;
    }
}

// Pobieranie komentarzy z bazy danych
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<p><strong>" . $row["name"] . "</strong> (" . $row["date"] . "): " . $row["comment"] . "</p>";
        // Formularz do usuwania komentarza
        echo "<form action='index.php#comments' method='post'>";
        echo "<input type='hidden' name='delete' value='" . $row["id"] . "'>";
        echo "<input type='submit' value='Usuń'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "Brak komentarzy.";
}

$conn->close();
?>
