<!DOCTYPE html>
<html>
<head>
    <style>
        footer {
          margin: auto;
          width: 100%;
          text-align: center;
        }
        .header {
            color: #0A0A0A;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            box-shadow: 0px 10px 6px -8px rgba(34, 60, 80, 0.5);
        }
        .logo {
            order: 0;
        }
        .text {
            order: 1;
            width: 100%;
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #0A0A0A;
            margin: 0;
            padding: 0;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
      <div class="header">
          <div class="logo">
              <img src="https://mospolytech.ru/upload/medialibrary/5fa/Logo_Polytech_rus_main.jpg" width="200px" alt="Логотип">
          </div>
          <div class="text">
              <h1>Домашняя работа: Solve the equation</h1>
          </div>
      </div>
    </header>
    <main>
<?php
    $str = "27 - X = 17";
    $parts = explode(" ", $str);
    $xPos = array_search("X", $parts);
    $result = 0;

    switch ($parts[1]) {
        case '+':
            if ($xPos == 0) {
                $result = $parts[4] - $parts[2];
            } else {
                $result = $parts[4] - $parts[0];
            }
            break;
        case '-':
            if ($xPos == 0) {
                $result = $parts[4] + $parts[2];
            } else {
                $result = $parts[0] - $parts[4];
            }
            break;
        case '*':
            if ($xPos == 0) {
                $result = $parts[4] / $parts[2];
            } else {
                $result = $parts[4] / $parts[0];
            }
            break;
        case '/':
            if ($xPos == 0) {
                $result = $parts[4] * $parts[2];
            } else {
                $result = $parts[0] / $parts[4];
            }
            break;
          }
    echo $result;
?>
    </main>
    <footer>
        <h2>Задание для самостоятельной работы</h2>
    </footer>
</body>
</html>
