<?php
session_start();

if (!isset($_SESSION['login_active'])) {
  header("Location: index.php");
  exit();
}

require_once ("connect.php");

// Pobierz historię z bazy danych
$user_id = $_SESSION['user_id'];
$sql = "SELECT h.date, c.category_name, h.score, h.total_questions 
        FROM history h 
        JOIN categories c ON h.category_id = c.category_id 
        WHERE h.user_id = $user_id";
$result = mysqli_query($conn, $sql);

$history = [];
while ($row = mysqli_fetch_assoc($result)) {
  $history[] = $row;
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Studiquiz menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <style>
    body,
    html {
      height: 100%;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .content {
      flex: 1;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <section class="main-section">
      <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary bg-dark" data-bs-theme="dark">
        <a class="navbar-brand" href="main.php">Strona główna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="history.php">Historia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="day_quiz.php">Quiz dnia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">O nas </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="guestbook.php">Księga gości</a>
            </li>
          </ul>
          <div class="d-flex">
            <a class="btn btn-danger" href="logout.php">Wyloguj</a>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container">
          <h1 class="mt-5">Historia Quizów</h1>
          <div class="table-responsive mt-4">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Kategoria</th>
                  <th scope="col">Wynik</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($history as $record): ?>
                  <tr>
                    <td><?= $record['date'] ?></td>
                    <td><?= $record['category_name'] ?></td>
                    <td><?= $record['score'] ?>/<?= $record['total_questions'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </section>
  </div>
  <footer class="bg-dark text-white text-center text-lg-start mt-4 pt-4">
    <div class="container p-4">
      <div class="row align-items-center justify-content-lg-center">
        <div class="col-lg-auto mb-3 col-md-12">
          <p class="mb-0">&copy; 2024 Studiquiz. Wszelkie prawa zastrzeżone.</p>
        </div>
        <div class="col-lg col-md-12">
          <ul class="list-unstyled d-flex justify-content-between">
            <li><a href="about.php" class="text-white">O nas</a></li>
            <li><a href="#" class="text-white">Jak stworzyć własny quiz</a></li>
            <li><a href="contacts.php" class="text-white">Kontakt</a></li>
            <li><a href="#" class="text-white">Polityka prywatności</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>