<?php
$sql = 'SELECT `id`, `firstname`, LEFT(`name`, 1) N, LEFT(`lastname`, 1) L FROM `friends`';
$res = mysqli_query($connect, $sql);
if (mysqli_errno($connect)) {
    echo '<div class="alert alert-danger" role="alert">' . mysqli_error($connect) . '</div>';
}
?>

<div class="container">
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($res)): ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="?p=update&id=<?=$row['id'];?>">
                            <?=$row['firstname'] . ' ' . $row['N'] . '.' . $row['L'] . '.';?>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php if (isset($_GET['id'])) include('form.php'); ?>
</div>
