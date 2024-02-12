<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$a = 27;
$b = 12;

if ($a) {
    echo "Отношение b к a: " . $b / $a;
} else {
    echo "a приведено к булевому типу данных: " . (bool)$a;
}
?>


</body>
</html>