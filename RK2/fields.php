<?php
$db = require('bd.php');
$conn = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

function getFields($conn) {
    $sql = "SELECT * FROM Field";
    $result = $conn->query($sql);
    $fields = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fields[] = $row;
        }
    }
    return $fields;
}

function getHashtagsForField($conn, $fieldId) {
    $sql = "SELECT h.name
            FROM Hashtags h
            INNER JOIN hashtags_field hf ON h.id = hf.id_hashtag
            WHERE hf.id_field = $fieldId";
    $result = $conn->query($sql);
    $hashtags = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hashtags[] = $row['name'];
        }
    }
    return $hashtags;
}

function getPostsForField($conn, $fieldId) {
    $hashtags = getHashtagsForField($conn, $fieldId);
    $hashtagsStr = implode("','", $hashtags);
    $sql = "SELECT s.description, s.data, h.name
            FROM SMS s
            INNER JOIN Hashtags h ON s.hashtag_id = h.id
            WHERE h.name IN ('$hashtagsStr')";
    $result = $conn->query($sql);
    $posts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function createField($conn, $name, $description, $hashtags) {
    $sql = "INSERT INTO Field (name, description) VALUES ('$name', '$description')";
    $conn->query($sql);
    if ($conn->error) {
        die("Ошибка SQL: " . $conn->error);
    }
    $fieldId = $conn->insert_id;

    foreach ($hashtags as $hashtag) {
        $hashtag = mysqli_real_escape_string($conn, $hashtag);
        $sql = "SELECT id FROM Hashtags WHERE name = '$hashtag'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $hashtagId = $result->fetch_assoc()['id'];
        } else {
            $sql = "INSERT INTO Hashtags (name) VALUES ('$hashtag')";
            $conn->query($sql);
            if ($conn->error) {
                die("Ошибка SQL: " . $conn->error);
            }
            $hashtagId = $conn->insert_id;
        }

        $sql = "INSERT INTO hashtags_field (id_hashtag, id_field) VALUES ('$hashtagId', '$fieldId')";
        $conn->query($sql);
        if ($conn->error) {
            die("Ошибка SQL: " . $conn->error);
        }
    }
}

function getAllHashtags($conn) {
  $sql = "SELECT name FROM Hashtags";
  $result = $conn->query($sql);
  $hashtags = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $hashtags[] = $row['name'];
      }
  }
  return $hashtags;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['field_name'];
  $description = $_POST['field_description'];
  $hashtags = isset($_POST['hashtags']) ? $_POST['hashtags'] : array();
  createField($conn, $name, $description, $hashtags);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Области знаний</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
        <h1>Области знаний</h1>

        <div class="card mb-3">
            <div class="card-header">
                Создать новую область знаний
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="field_name">Название области знаний</label>
                        <input type="text" class="form-control" id="field_name" name="field_name" required>
                    </div>
                    <div class="form-group">
                        <label for="field_description">Описание области знаний</label>
                        <textarea class="form-control" id="field_description" name="field_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Хештеги</label>
                        <?php
                        $allHashtags = getAllHashtags($conn);
                        foreach ($allHashtags as $hashtag) {
                            echo "<div class='form-check'>";
                            echo "<input type='checkbox' class='form-check-input' id='hashtag_{$hashtag}' name='hashtags[]' value='{$hashtag}'>";
                            echo "<label class='form-check-label' for='hashtag_{$hashtag}'>{$hashtag}</label>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать область знаний</button>
                </form>
            </div>
        </div>

        <form method="get" action="fields.php">
            <div class="form-group">
                <label for="field">Выберите область знаний:</label>
                <select class="form-control" id="field" name="field_id">
                    <option value="">Выберите область</option>
                    <?php
                    $fields = getFields($conn);
                    foreach ($fields as $field) {
                        echo "<option value='{$field['id']}'>{$field['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Показать посты</button>
        </form>

        <?php
        if (isset($_GET['field_id']) && $_GET['field_id'] != '') {
            $fieldId = $_GET['field_id'];
            $posts = getPostsForField($conn, $fieldId);
            if (count($posts) > 0) {
                foreach ($posts as $post) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<p class='card-text'>{$post['description']}</p>";
                    echo "<p class='card-text'><small class='text-muted'>Хештег: {$post['name']}</small></p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Нет постов для выбранной области знаний.</p>";
            }
        }
        ?>
    </div>
</body>
</html>