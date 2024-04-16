<?php
$data = require("db.php");
$connect = mysqli_connect($data['host'], $data['username'], $data['password'], $data['database']);
if (mysqli_connect_errno()) print mysqli_connect_error();
include('header.php');
if (!isset($_GET['p'])) $_GET['p']='view';
if (isset($_GET['p']) && $_GET['p']=='add') include('add.php');
if (isset($_GET['p']) && $_GET['p']=='view') include('view.php');
include('footer.html');
?>