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
  <title>O nas - Studiquiz</title>
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
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card mt-4">
            <div class="card-body">
              <h2 class="card-title">O nas</h2>
              <p class="card-text">
                Witaj na Studiquiz! Jesteśmy grupą pasjonatów, którzy połączyli swoją miłość do nauki z
                fascynacją technologią, aby stworzyć platformę, która sprawi, że nauka będzie przyjemna i
                dostępna dla wszystkich.
              </p>
              <p class="card-text">
                Nasza historia sięga głęboko, gdyż zaczęliśmy od małego projektu, który szybko się rozrósł
                dzięki wsparciu naszej fantastycznej społeczności. Teraz jesteśmy tu, by dostarczyć Ci najlepsze
                quizy na każdy temat, od matematyki po popkulturę, od historii po technologię.
              </p>
              <p class="card-text">
                Nasza misja polega na inspirowaniu do nauki i rozwoju poprzez wciągające quizy, które są
                nie tylko edukacyjne, ale także zabawne. Chcemy, aby każdy mógł czerpać radość z poszerzania
                swojej wiedzy i rozwijania umiejętności.
              </p>
              <p class="card-text">
                Tworzymy quizy z pasją i zaangażowaniem, dbając o ich jakość i zróżnicowanie, aby każdy mógł
                znaleźć coś dla siebie. Dziękujemy Ci za to, że jesteś z nami w tej podróży edukacyjnej!
              </p>
              <p class="card-text">
                Naszą pasją jest tworzenie quizów, które nie tylko sprawiają radość, ale także pobudzają do myślenia
                i poszerzają horyzonty. Chcemy, aby Studiquiz był miejscem, gdzie każdy może rozwijać się i
                poznawać nowe rzeczy.
              </p>
              <p class="card-text">
                Dlatego każdego dnia pracujemy nad udoskonalaniem naszej platformy i tworzeniem nowych, ciekawych
                quizów, które będą dostępne dla wszystkich naszych użytkowników. Dziękujemy, że jesteś z nami
                w tej podróży edukacyjnej!
              </p>
              <p class="card-text">
                Jesteśmy zainspirowani misją umożliwienia każdemu dostępu do ciekawych i interaktywnych form nauki,
                dlatego
                stale poszukujemy nowych sposobów na ulepszenie Studiquiz. Naszym celem jest zapewnienie Ci najlepszych
                doświadczeń edukacyjnych, które będą motywować do nauki i rozwijania się każdego dnia.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
  <footer class="bg-dark text-white text-center text-lg-start mt-4 pt-4 col-md-12">
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
  <script src="js/main.js"></script>
</body>

</html>