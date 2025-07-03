<?php
session_start();

if (!isset($_SESSION['login_active'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynik Quizu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body, html {
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
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

    </section>
    <div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-5 p-3 text-center">
                    <div class="card-body">
                        <h5 class="card-title py-2 text-center">Quiz ukończony</h5>
                        <p class="btn btn-warning">Twój wynik : <?php echo $_SESSION['score']; ?> na
                            <?= $_SESSION['total_questions'] ?> punktów.</p>
                    </div>
                </div>
                <div class="card my-2 p-3 text-center">
                    <div class="card-body">
                        <a href="quiz.php?category_id=<?= $_SESSION['category_id'] ?>" class="btn btn-info">Powtórz
                            quiz</a>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-info" href="main.php">Wróć do głównej strony</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <li><a href="#" class="text-white">Kontakt</a></li>
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