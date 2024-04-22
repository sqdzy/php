<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Добавить сообщение</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="sms.php">СМС</a>
                    </li>
                    <li class="nav-item">
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
      <h1>Добавить сообщение</h1>
      <form action="" method="post">
        <div class="form-group">
          <label for="channel">Канал</label>
          <select class="form-control" id="channel" name="channel" required>
            <?php
            $db = require('bd.php');
            $conn = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
            
            $sql = "SELECT * FROM Channel";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Сообщение</label>
          <textarea class="form-control" id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
    </div>
    <?php 
    if (isset($_POST['channel']) && isset($_POST['message'])) {
        
        $channel = mysqli_real_escape_string($conn, $_POST['channel']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        preg_match_all('/#([^\s#]+)/u', $message, $matches);
        $hashtags = $matches[1];

        foreach ($hashtags as $hashtag) {
            $hashtag = mysqli_real_escape_string($conn, $hashtag);

            $sql = "SELECT id FROM Hashtags WHERE name = '$hashtag'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $hashtag_id = $result->fetch_assoc()['id'];
            } else {
                $sql = "INSERT INTO Hashtags (name) VALUES ('$hashtag')";
                $conn->query($sql);
                if ($conn->error) {
                    die("Ошибка SQL: " . $conn->error);
                }
                $hashtag_id = $conn->insert_id;
            }

            $sql = "INSERT INTO SMS (channel_id, description, hashtag_id) VALUES ('$channel', '$message', '$hashtag_id')";
            $conn->query($sql);
            if ($conn->error) {
                die("Ошибка SQL: " . $conn->error);
            }
        }
    }

    $conn->close();
    ?>
  </body>
</html>
