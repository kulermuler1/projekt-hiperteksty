<?php
require_once ("connect.php");
require_once ("function.php");
session_start();

if (isset($_SESSION['login_active'])) {
  header("Location: main.php");
  exit();
} else {

  if (isset($_POST['login'])) {
    $email = santize($_POST['email']);
    $inputpassword = santize($_POST['password']);
    $password = md5($inputpassword);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['login_active'] = [$row["name"], $row["email"]];
        $_SESSION['user_id'] = $row["id"];
        $_SESSION['msg'] = "Witamy w Studiquiz";
        $_SESSION['class'] = "text-bg-success";
        header("Location: main.php");
        exit();
      }
    } else {
      $_SESSION['msg'] = "Sprawdź maila oraz hasło";
      $_SESSION['class'] = "text-bg-danger";
      header("Location: index.php");
      exit();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Studiquiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="main-section">
    <div class="container">

      <?php if (isset($_SESSION['msg'])): ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
          <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header <?php echo $_SESSION['class']; ?>">
              <strong class="me-auto">Powiadomienie</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>          `
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

      <div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-7 col-lg-4">
          <div class="box rounded">
            <div class="img"></div>
            <div class="login-box p-5">
              <h2 class="pb-4">Witamy serdecznie</h2>
              <form action="" method="post">
                <div class="mb-4">
                  <input type="email" class="form-control" placeholder="Wpisz swój adres e-mail" name="email">
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control" placeholder="Wpisz swoje hasło" name="password">
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary" name="login">Zaloguj się </button>
                </div>
              </form>

              <div class="py-4 text-center">
                Dołącz do nas, <a href="signup.php" class="link">Zarejestruj sie</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>