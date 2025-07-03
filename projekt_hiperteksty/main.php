<?php
require_once ("connect.php");
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

    /* Dodaj stylizację do bloków kategorii */
    .quiz-card {
      cursor: pointer;
      transition: transform 0.3s ease-in-out;
      /* Dodaj animację dla właściwości transform */
    }

    .quiz-card:hover {
      transform: scale(1.05);
      /* Powiększ blok po najechaniu myszką */
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
          <?php if (isset($_SESSION['msg'])): ?>
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
              <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header <?php echo $_SESSION['class']; ?>">
                  <strong class="me-auto">Sukces</strong>
                  <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                  <?php
                  $message = $_SESSION['msg'];
                  unset($_SESSION['msg']);
                  echo $message;
                  ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <div class="row justify-content-center">
            <h2 class="pt-4">Witaj w Studiquiz <?php echo $_SESSION['login_active']['0']; ?></h2>

            <div class="row mt-6 justify-content-center">
              <h3 class="text-center">Wybierz kategorię</h3>
              <div class="row g-3">
                <div class="col-md-4">
                  <div class="card quiz-card" onclick="redirectToQuizzes('jedzenie')">
                    <img src="img/quiz1.jpg" alt="Quiz 1">
                    <div class="card-body text-center">
                      <h3 class="card-title">Jedzenie</h3>
                      <a href="quiz.php?category_id=1" class="btn btn-warning m-1">Start</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card quiz-card" onclick="redirectToQuizzes('muzyka')">
                    <img src="img/quiz2.jpg" alt="Quiz 2">
                    <div class="card-body text-center">
                      <h3 class="card-title">Muzyka</h3>
                      <a href="quiz.php?category_id=3" class="btn btn-warning m-1">Start</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card quiz-card" onclick="redirectToQuizzes('sport')">
                    <img src="img/quiz3.jpg" alt="Quiz 3">
                    <div class="card-body text-center">
                      <h3 class="card-title">Sport</h3>
                      <a href="quiz.php?category_id=2" class="btn btn-warning m-1">Start</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card quiz-card" onclick="redirectToQuizzes('przyroda')">
                    <img src="img/quiz4.jpg" alt="Quiz 4">
                    <div class="card-body text-center">
                      <h3 class="card-title">Przyroda</h3>
                      <a href="quiz.php?category_id=4" class="btn btn-warning m-1">Start</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card quiz-card" onclick="redirectToQuizzes('motoryzacja')">
                    <img src="img/quiz5.jpg" alt="Quiz 5">
                    <div class="card-body text-center">
                      <h3 class="card-title">Motoryzacja</h3>
                      <a href="quiz.php?category_id=5" class="btn btn-warning m-1">Start</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card quiz-card" onclick="redirectToQuizzes('it')">
                    <img src="img/quiz6.jpg" alt="Quiz 6">
                    <div class="card-body text-center">
                      <h3 class="card-title">IT</h3>
                      <a href="quiz.php?category_id=6" class="btn btn-warning m-1">Start</a>
                    </div>
                  </div>
                </div>
              </div>
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