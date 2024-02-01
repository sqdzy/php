<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
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
</body>
</html>