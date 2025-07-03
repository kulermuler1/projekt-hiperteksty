<?php
require_once("connect.php");
session_start();

// Sprawdza, czy użytkownik jest zalogowany
if (!isset($_SESSION['login_active'])) {
    header("Location: index.php");
    exit();
}

// Sprawdza, czy zostały ustawione zmienne sesji 'user_id' i 'category_id'
if (!isset($_SESSION['user_id']) || !isset($_SESSION['category_id'])) {
    // Jeśli zmienne sesji nie zostały ustawione, przekierowuje użytkownika na stronę główną
    header("Location: main.php");
    exit();
}

// Pobiera identyfikator kategorii i użytkownika zmiennych sesji
$category_id = $_SESSION['category_id'];
$user_id = $_SESSION['user_id'];

// Pobiera całkowitą liczbę pytań w danej kategorii
$query = "SELECT COUNT(*) AS total_questions FROM quiz_questions WHERE category_id = $category_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_questions = $row['total_questions'];

$score = 0;

// Sprawdza, czy odpowiedzi zostały przesłane
if (isset($_POST['answers']) && !empty($_POST['answers'])) {
    $answers = $_POST['answers'];

    // Iteruje przez odpowiedzi i sprawdza poprawność odpowiedzi
    foreach ($answers as $question_id => $answer) {
        $question_id = (int)$question_id;
        $answer = (int)$answer;

        // Pobiera poprawną odpowiedź z bazy danych
        $query = "SELECT correct_answer_id FROM quiz_questions WHERE question_id = $question_id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Jeśli odpowiedź użytkownika jest zgodna z poprawną odpowiedzią, zwiększa wynik
        if ($row && $row['correct_answer_id'] == $answer) {
            $score++;
        }
    }
}

// Ustawia zmienne sesji 'score' i 'total_questions' na wynik quizu i całkowitą liczbę pytań
$_SESSION['score'] = $score;
$_SESSION['total_questions'] = $total_questions;

// Dodaje wpis do tabeli 'history' z wynikiem quizu
$query = "INSERT INTO history (user_id, category_id, score, total_questions) VALUES ('$user_id', '$category_id', '$score', '$total_questions')";
mysqli_query($conn, $query);

// Przekierowuje użytkownika do strony wyników
header("Location: result.php");
exit();
?>
