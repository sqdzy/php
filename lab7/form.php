<?php
    $sql = 'SELECT * FROM `friends` WHERE `id`='.$_GET['id_update'].'';
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) print_r(mysqli_error($connect));
    $row = mysqli_fetch_assoc($res);
?>

<form class="mt-3" action="index.php" method="POST">
    <input type="hidden" name="update">
    <input type="hidden" name="id" value="<?=$_GET['id_update'];?>">
  <div class="form-group">
        <label for="firstname">Firstname</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" value="<?=$row['firstname'];?>">
  </div>
  <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" id="name" name="name" value="<?=$row['name'];?>">
  </div>
  <div class="form-group">
        <label for="lastname">Lastname</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" value="<?=$row['lastname'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender" value="<?=$row['gender'];?>">
      <option>female</option>
      <option>male</option>
    </select>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input required type="date" class="form-control" id="date" name="date" value="<?=$row['date'];?>">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="<?=$row['phone'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input required type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="<?=$row['email'];?>">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea required class="form-control" id="address" rows="3" name="address"><?=$row['address'];?></textarea>
  </div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" rows="3" name="comment"><?=$row['comment'];?></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>