<?php 
$data = require("db.php");
$connect = mysqli_connect($data['host'], $data['username'], $data['password'], $data['database']);

$sql = "SELECT * FROM friends";
$result = mysqli_query($connect, $sql);
?>

<table class='table'>
<thead>
<tr>
<th scope='col'>#</th>
<th scope='col'>Firstname</th>
<th scope='col'>Name</th>
<th scope='col'>Gender</th>
<th scope='col'>Date</th>
<th scope='col'>Phone</th>
<th scope='col'>Adress</th>
<th scope='col'>Email</th>
<th scope='col'>Comment</th>
</tr>
</thead>
<tbody>
<?php
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope='row'>" . $row["id"] . "</th>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["adress"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["comment"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($connect);
?>
