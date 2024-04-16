<div class="container">
  <form method="POST" action="add.php">
    <div class="form-group">
      <label for="exampleInputEmail1">Firstname</label>
      <input type="text" class="form-control" id="exampleInput1" placeholder="Firstname" name = "firstname" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Name</label>
      <input type="text" class="form-control" id="exampleInput2" placeholder="Name" name = "name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Gender</label>
      <input type="text" class="form-control" id="exampleInput3" placeholder="Gender" name = "gender" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Date</label>
      <input type="date" class="form-control" id="exampleInput4" placeholder="Date" name = "date" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Phone</label>
      <input type="tel" class="form-control" id="exampleInput5" placeholder="Phone" name = "phone" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Address</label>
      <input type="text" class="form-control" id="exampleInput6" placeholder="Address" name = "adress" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" class="form-control" id="exampleInput7" placeholder="Email" name = "email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Comment</label>
      <input type="text" class="form-control" id="exampleInput8" placeholder="Comment" name = "comment">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = require("db.php");
    $connect = mysqli_connect($data['host'], $data['username'], $data['password'], $data['database']);

    $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $adress = mysqli_real_escape_string($connect, $_POST['adress']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $comment = mysqli_real_escape_string($connect, $_POST['comment']);

    $sql = "INSERT INTO friends (Firstname, Name, Gender, Date, Phone, Adress, Email, Comment) VALUES ('$firstname', '$name', '$gender', '$date', '$phone', '$adress', '$email', '$comment')";

    if (mysqli_query($connect, $sql)) {
        echo "Записал";
    } else {
        echo "Ошибка: ".$sql."<br>".mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>
