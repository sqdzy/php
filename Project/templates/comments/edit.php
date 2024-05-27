<?php require(dirname(__DIR__) . '/header.php'); ?>

<h1>Редактировать комментарий</h1>

<form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comments/<?= $comment->getId(); ?>/update" method="post">
  <div class="form-group">
    <label for="text">Комментарий</label>
    <textarea name="text" id="text" class="form-control" required><?= htmlspecialchars($comment->getText()) ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
</form>

<?php require(dirname(__DIR__) . '/footer.php'); ?>