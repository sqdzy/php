<?php
    $res = mysqli_query($connect, "SELECT COUNT(*) FROM `friends`");
    $count = mysqli_fetch_row($res);
    $count_read = 5;
    $pages = ceil($count[0]/$count_read);
    $page = $_GET['page']*$count_read;

    $sql = 'SELECT * FROM `friends` ORDER BY '.$_GET['o'].' LIMIT '.$page.','.$count_read;
    $res = mysqli_query($connect, $sql);
    
    if (mysqli_errno($connect)) print_r(mysqli_error($connect));

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Firstname</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Gender</th>
      <th scope="col">Date</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">comment</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($res)):?>
    <tr>
      <th scope="row"><?=$row['id'];?></th>
      <td><?=$row['firstname'];?></td>
      <td><?=$row['name'];?></td>
      <td><?=$row['lastname'];?></td>
      <td><?=$row['gender'];?></td>
      <td><?=$row['date'];?></td>
      <td><?=$row['phone'];?></td>
      <td><?=$row['address'];?></td>
      <td><?=$row['email'];?></td>
      <td><?=$row['comment'];?></td>
    </tr>
    <?php endwhile;?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php for($i=0; $i<$pages; $i++):?>
        <li class="page-item <?php if($_GET['page'] == $i) echo 'active';?>"><a class="page-link" href="<?=$_SERVER['SCRIPT_NAME'];?>?page=<?=$i;?>"><?=$i+1;?></a></li>
    <?php endfor;?>
  </ul>
</nav>