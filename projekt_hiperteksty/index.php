<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciekawostki Star Wars</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Ciekawostki ze Świata Star Wars</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#intro">Wprowadzenie</a></li>
            <li><a href="#characters">Postacie</a></li>
            <li><a href="#planets">Planety</a></li>
            <li><a href="#gallery">Galeria</a></li>
            <li><a href="#comments">Komentarze</a></li>
        </ul>
    </nav>

    <section id="intro">
        <h2>Wprowadzenie</h2>
        <p>Świat Star Wars, znany również jako Gwiezdne Wojny, to epicka saga stworzona przez George'a Lucasa. Zawiera ona szereg filmów, książek, gier i innych mediów, które rozwijają ten fascynujący wszechświat. Od pierwszego filmu wydanego w 1977 roku, Star Wars stał się jednym z najbardziej ikonicznych uniwersów w historii popkultury.</p>
    </section>

    <section id="characters">
        <h2>Postacie</h2>
        <div class="character">
            <img src="image2.png" alt="Luke Skywalker">
            <div class="description">
                <h3>Luke Skywalker</h3>
                <p>Luke Skywalker jest synem Anakina Skywalkera i Jedi, który odgrywał kluczową rolę w walce przeciwko Imperium Galaktycznemu.</p>
            </div>
        </div>
        <!-- Analogicznie dla innych postaci -->
    </section>

    <section id="planets">
        <h2>Planety</h2>
        <div class="planet">
            <img src="image3.jpg" alt="Tatooine">
            <div class="description">
                <h3>Tatooine</h3>
                <p>Tatooine to pustynna planeta, na której rozpoczyna się przygoda Luke'a Skywalkera.</p>
            </div>
        </div>
        <!-- Analogicznie dla innych planet -->
    </section>

    <section id="gallery">
        <h2>Galeria</h2>
        <div class="slider">
            <div class="slide"><img src="images/image1.png" alt="Napis"></div>
            <div class="slide"><img src="images/image2.png" alt="Luke Skywalker"></div>
            <div class="slide"><img src="images/image3.jpg" alt="Tattoine"></div>
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </section>

    <section id="comments">
        <h2>Komentarze</h2>
        <form id="comment-form" action="index.php" method="post">
            <label for="name">Imię:</label>
            <input type="text" id="name" name="name" required>
            <label for="comment">Komentarz:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>
            <input type="submit" name="submit" value="Dodaj Komentarz">
        </form>
        <div id="comments-container">
            <!-- Zawartość sekcji komentarzy -->
            <?php include 'display_comments.php'; ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Ciekawostki Star Wars</p>
    </footer>

    
    <script src="jss/script.js"></script>
</body>
</html>
