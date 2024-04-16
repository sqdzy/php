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
        .calculator {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .calculator input[type="number"], select {
            padding: 5px;
            margin-bottom: 10px;
        }
        .calculator input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #181818;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(255,255,255,0.1);
        }
        .form-field {
            margin-bottom: 20px;
        }
        .form-field label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }
        .form-field input[type="text"],
        .form-field input[type="email"],
        .form-field textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #282828;
            color: #fff;
        }
        .form-field input[type="checkbox"] {
            margin-right: 10px;
        }
        .form-field button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-field button:hover {
            background-color: #0056b3;
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
              <h1>Домашняя работа: Feedback Form</h1>
          </div>
      </div>
    </header>

    <main>
    <div class="calculator">
      <form method="post" class="form-container">
          <textarea name="expression" class="form-field" cols="78" rows="10" required></textarea>
          <input type="submit" value="Вычислить">
      </form>
    <div id="result"></div>
    </div>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $expression = $_POST["expression"];
         echo calculate($expression);
     }
//function calculate($expression) {
//    $expression = str_replace(' ', '', $expression);

//    while (strpos($expression, "(") !== false) {
//        $open = strrpos($expression, "(");
//        $close = strpos($expression, ")", $open);
//        $sub = substr($expression, $open + 1, $close - $open - 1);
//        $expression = substr_replace($expression, calculate($sub), $open, $close - $open + 1);
//    }

//    while (strpos($expression, "*") !== false || strpos($expression, "/") !== false) {
//        if (strpos($expression, "*") < strpos($expression, "/") || strpos($expression, "/") === false) {
//            $pos = strpos($expression, "*");
//            $oper = "*";
//        } else {
//            $pos = strpos($expression, "/");
//            $oper = "/";
//        }
//        $left = strrpos(substr($expression, 0, $pos), "+");
//        $right = strpos($expression, "+", $pos);
//        if ($left === false) $left = -1;
//        if ($right === false) $right = strlen($expression);
//        $sub = substr($expression, $left + 1, $right - $left - 1);
//        $nums = explode($oper, $sub);
//        if (isset($nums[0]) && isset($nums[1])) {
//            $result = $oper == "*" ? floatval($nums[0]) * floatval($nums[1]) : floatval($nums[0]) / floatval($nums[1]);
//            $expression = substr_replace($expression, $result, $left + 1, strlen($sub));
//        }
//    }

//    $sum = 0.0;
//    $num = "";
//    $oper = "+";
//    for ($i = 0; $i < strlen($expression); $i++) {
//        if ($expression[$i] == '+' || $expression[$i] == '-') {
//            if ($oper == '+') {
//                $sum += floatval($num);
//            } else {
//                $sum -= floatval($num);
//            }
//            $num = "";
//            $oper = $expression[$i];
//        } else {
//            $num .= $expression[$i];
//        }
//    }
//    if ($oper == '+') {
//        $sum += floatval($num);
//    } else {
//        $sum -= floatval($num);
//    }

//    return $sum;
//}

function calculate($expression) {
  $expression = str_replace(' ', '', $expression);

  $expression = preg_replace_callback('/sin\(([^()]*)\)/', function($match) {
    return sin(deg2rad(calculate($match[1])));
  }, $expression);
  $expression = preg_replace_callback('/cos\(([^()]*)\)/', function($match) {
    return cos(deg2rad(calculate($match[1])));
  }, $expression);
  $expression = preg_replace_callback('/tan\(([^()]*)\)/', function($match) {
    return tan(deg2rad(calculate($match[1])));
  }, $expression);
  $expression = preg_replace_callback('/cot\(([^()]*)\)/', function($match) {
    return 1 / tan(deg2rad(calculate($match[1])));
  }, $expression);

  while (preg_match('/\(([^()]*)\)/', $expression, $match)) {
      $result = calculate($match[1]);
      $expression = str_replace($match[0], $result, $expression);
  }

  while (preg_match('/(-?\d+(\.\d+)?)([\/*])(-?\d+(\.\d+)?)/', $expression, $match)) {
      if ($match[3] == '*') {
          $result = $match[1] * $match[4];
      } else {
          $result = $match[1] / $match[4];
      }
      $expression = str_replace($match[0], $result, $expression);
  }

  while (preg_match('/(-?\d+(\.\d+)?)([+-])(-?\d+(\.\d+)?)/', $expression, $match)) {
      if ($match[3] == '+') {
          $result = $match[1] + $match[4];
      } else {
          $result = $match[1] - $match[4];
      }
      $expression = str_replace($match[0], $result, $expression);
  }

  return $expression;
}

?>
     


</main>
</body>
    <footer>
        <h2>Задание для самостоятельной работы</h2>
    </footer>
</body>
</html>
