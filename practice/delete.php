<?php
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $sql = 'DELETE FROM `friends` WHERE `id` = ' . $_GET['id'];
    $result = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) {
        $error = mysqli_error($connect);
    } else {
        $success = 'Запись удалена';
    }
}
?>

<?php
$sql = 'SELECT `id`, `firstname`, LEFT(`name`, 1) N, LEFT(`lastname`, 1) L FROM `friends`';
$res = mysqli_query($connect, $sql);
if (mysqli_errno($connect)) {
    $error = mysqli_error($connect);
}
?>

<div class="container">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Ошибка</h4>
            <p><?=$error;?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Успех</h4>
            <p><?=$success;?></p>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($res)): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$row['firstname'] . ' ' . $row['N'] . '.' . $row['L'] . '.';?>
                        </h5>
                        <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?=$row['id'];?>)">Удалить</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить эту запись?')) {
        window.location.href = '?p=delete&id=' + id + '&action=delete';
    }
}
</script>