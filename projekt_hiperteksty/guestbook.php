<?php
require_once ("connect.php");
session_start();

// Obsługa dodawania wpisu do księgi gości
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO guestbook (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($conn, $sql)) {
        $msg = "Twój wpis został dodany do księgi gości.";
        $class = "text-success";
    } else {
        $msg = "Wystąpił błąd. Spróbuj ponownie.";
        $class = "text-danger";
    }
}

// Obsługa usuwania wpisu z księgi gości
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql_delete = "DELETE FROM guestbook WHERE id='$id'";
    if (mysqli_query($conn, $sql_delete)) {
        $msg_delete = "Wpis został pomyślnie usunięty.";
        $class_delete = "text-success";
    } else {
        $msg_delete = "Wystąpił błąd podczas usuwania wpisu.";
        $class_delete = "text-danger";
    }
}

// Pobierz wszystkie wpisy z księgi gości
$sql_guestbook = "SELECT * FROM guestbook ORDER BY created_at DESC";
$result_guestbook = mysqli_query($conn, $sql_guestbook);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt i księga gości</title>
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
        <div class="container mt-5">
            <?php if (isset($msg)): ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <h2 class="text-center mb-4">Księga gości</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Imię:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Wiadomość:</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Dodaj wpis</button>
            </form>

            <hr>

            <h3 class="text-center my-4">Wpisy w księdze gości:</h3>
            <?php while ($row = mysqli_fetch_assoc($result_guestbook)): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['email']; ?></h6>
                        <p class="card-text"><?php echo $row['message']; ?></p>
                        <p class="card-text"><small class="text-muted">Dodano: <?php echo $row['created_at']; ?></small></p>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-danger" name="delete">Usuń</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
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
    <script src="js/main.js"></script>
</body>

</html>