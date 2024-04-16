<div class="container">
    <?php 
        $sql = 'SELECT `id`,`firstname`, LEFT(`name`,1) N, LEFT(`lastname`,1) L FROM `friends` ORDER BY `firstname`';
        $res = mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) print_r(mysqli_error($connect));
    ?>
    <?php while($row = mysqli_fetch_assoc($res)):?>
      <a href="?id=<?=$row['id'];?>">
                <?=$row['firstname'].' '.$row['N'].'.'.$row['L'].'.<br>';?></a>
    <?php endwhile;?>   
</div>
