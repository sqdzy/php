<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$str = "baaa bbaa bbaaa baaccc";
$pattern = "/b(a{3})/";
$replacement = "b!";
$result = preg_replace($pattern, $replacement, $str);
echo $result."<br>"; 

$str = "ahb acb aeb aeeb adcb axeb";
$pattern = "/a.b/";
preg_match_all($pattern, $str, $matches);
print_r($matches[0]); 
echo "<br>";

$str = "aa aba abba abbba abbbba abbbbba";
$pattern = "/ab+ba/";
preg_match_all($pattern, $str, $matches);
print_r($matches[0]); 
echo "<br>";

$str = "aaa@bbb eee7@kkk";
$pattern = "/(\w+)@(\w+)/";
$result = preg_replace($pattern, "$2@$1", $str);
echo $result."<br>"; 

?>
</body>
</html>