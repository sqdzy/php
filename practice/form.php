<?php
  $sql = 'SELECT * FROM `friends` WHERE `id`='.$_GET['id'];
  $res = mysqli_query($connect, $sql);
  if (mysqli_errno($connect)) print_r(mysqli_error($connect));
  $row = mysqli_fetch_assoc($res);
?>
<form action="index.php" method="POST">
<input type="hidden" name="update">
<input type="hidden" name="id" value="<?=$row['id'];?>">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" value="<?=$row['firstname']?>">
  </div>
  <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>">
  </div>
  <div class="form-group">
        <label for="lastname">Lastname</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" value="<?=$row['lastname']?>">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
      <option <?php if($row['gender'] == 'female') echo 'selected'?>>female</option>
      <option <?php if($row['gender'] == 'male') echo 'selected'?>>male</option>
    </select>
  </div>
  <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?=$row['date']?>">
  </div>
  <div class="form-group">
        <label for="phone">Phone</label>
        <input required type="tel" class="form-control" id="phone" name="phone" value="<?=$row['phone']?>">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input required type="email" class="form-control" id="email" placeholder="name@example.com" value="<?=$row['email'];?>" name="email">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea required class="form-control" id="address" rows="3" name="address"><?=$row['address']?></textarea>
  </div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" rows="3" name="comment"><?=$row['comment']?></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
