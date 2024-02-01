<!DOCTYPE html>
<html>
<head>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .logo {
            order: 0;
        }
        .text {
            order: 1;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://mospolytech.ru/upload/medialibrary/5fa/Logo_Polytech_rus_main.jpg" width="200px" alt="Логотип">
        </div>
        <div class="text">
            <h1>Домашняя работа: Hello, World!</h1>
        </div>
    </div>
    <main>
      <?php
        echo "<h1>Hello world</h1>";
        $a = 26;
        $b = "25";
        $c = 100;
        define("pi", 3.1415);
        $a = (string)$a;
        echo $a+$b;
        echo "<h1>".$a+$b."</h1>";
        echo pow($a, 2)."<br>";
        if ($a !== $b) echo "yes<br>";
        else echo "not";
        if ($a > $b) echo "yes<br>";
        else echo "not";
        echo $c++."<br>";
        ++$c;
        echo $c;
      ?>
    </main>
    <footer>
        <h2>задание для самостоятельно работы</h2>
    </footer>
</body>
</html>
