<?php
    $db = require('db.php');
    $connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) print_r(mysqli_connect_error());
    
    if (!isset($_GET['p'])) $_GET['p'] ='view';
    if (!isset($_GET['o'])) $_GET['o'] = 'id';
    if (!isset($_GET['page'])) $_GET['page'] = '0';

    if(isset($_POST['save'])) {
        $sql = "INSERT INTO `friends`
               (`firstname`, `name`, `lastname`, `gender`, `date`, 
               `phone`, `email`, `address`, `comment`) 
               VALUES (
               '".htmlspecialchars($_POST['firstname'])."',
               '".htmlspecialchars($_POST['name'])."',
               '".htmlspecialchars($_POST['lastname'])."',
               '".($_POST['gender'])."',
               '".($_POST['date'])."',
               '".($_POST['phone'])."',
               '".htmlspecialchars($_POST['email'])."',
               '".htmlspecialchars($_POST['address'])."',
               '".htmlspecialchars($_POST['comment'])."'
               )";
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) print_r(mysqli_error($connect));
    }

    if(isset($_POST['update'])){
        $sql = "UPDATE `friends` SET 
                `firstname`='".$_POST['firstname']."',
                `name`='".$_POST['name']."',
                `lastname`='".$_POST['lastname']."',
                `gender`='".$_POST['gender']."',
                `date`='".$_POST['date']."',
                `phone`='".$_POST['phone']."',
                `email`='".$_POST['email']."',
                `address`='".$_POST['address']."',
                `comment`='".$_POST['comment']."'
                 WHERE `id`=".$_POST['id'];
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) print_r(mysqli_error($connect));else $i = true;
      }

    if (isset($_GET['id'])){
        $sql = 'DELETE FROM `friends` WHERE `id`='.$_GET['id'];
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) print_r(mysqli_error($connect));else $i = true;
    }


    require('header.php');
        if (isset($_GET['p']) && 
            ($_GET['p']=='view' || $_GET['p']=='add' || 
            $_GET['p']=='update' || $_GET['p']=='delete')) include(''.$_GET['p'].'.php');
    require('footer.html');