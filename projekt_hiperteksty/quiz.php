<?php
require_once 'connect.php';
session_start();

if (!isset($_SESSION['login_active'])) {
    header("Location: index.php");
    exit();
}

$category_id = $_GET['category_id'];
$_SESSION['category_id']=$category_id;
// Pobieranie pytań i odpowiedzi
$query = "SELECT qq.question_id, qq.question, qa.answer_id, qa.answer 
          FROM quiz_questions qq 
          JOIN quiz_answers qa ON qq.question_id = qa.question_id 
          WHERE qq.category_id = $category_id";
$result = mysqli_query($conn, $query);

$questions = [];
while ($row = mysqli_fetch_assoc($result)) {
    $questions[$row['question_id']]['question'] = $row['question'];
    $questions[$row['question_id']]['answers'][] = [
        'answer_id' => $row['answer_id'],
        'answer' => $row['answer']
    ];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

        <form action="checkanswers.php" method="post">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($questions as $question_id => $question_data): ?>
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $question_data['question'] ?></h5>
                                    <?php foreach ($question_data['answers'] as $answer): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answers[<?= $question_id ?>]" value="<?= $answer['answer_id'] ?>" id="answer<?= $answer['answer_id'] ?>">
                                            <label class="form-check-label" for="answer<?= $answer['answer_id'] ?>">
                                                <?= $answer['answer'] ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <input type="hidden" name="category_id" value="<?= $category_id ?>">
                    <div class="col-md-8 text-center">
                        <button type="submit" class="btn btn-primary">Sprawdź odpowiedzi</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
