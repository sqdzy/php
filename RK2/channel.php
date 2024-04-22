<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Добавить канал</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sms.php">СМС</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="channel.php">Каналы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fields.php">Области знаний</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
      <h1>Добавить канал</h1>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Название</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="liked" name="liked">
          <label class="form-check-label" for="liked">Добавить в любимые</label>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
      </form>
    </div>
    <?php 
    $db = require('bd.php');
    $conn = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
    if (isset($_POST['name']) && isset($_POST['description'])) {
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $liked = isset($_POST['liked']) ? 1 : 0;

        $sql = "INSERT INTO Channel (name, description, liked)
        VALUES ('$name', '$description', '$liked')";

        $conn->query($sql);
    }

    $sql = "SELECT * FROM Channel";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='container mt-5'>";
        echo "<h2>Список каналов</h2>";
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Название</th><th>Описание</th><th>Любимый</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td><td>".($row["liked"] ? 'Да' : 'Нет')."</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Нет результатов";
    }

    $conn->close();
    ?>
  </body>
</html>
