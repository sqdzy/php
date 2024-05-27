<?php require(dirname(__DIR__) . '/header.php'); ?>
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $article->getName(); ?></h5>
    <p class="card-text"><?= $article->getText(); ?></p>
    <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/edit/<?= $article->getId(); ?>" class="btn btn-primary">Edit Article</a>
    <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/delete/<?= $article->getId(); ?>" class="btn btn-warning">Delete Article</a>
  </div>
</div>

<h2>Комментарии</h2>

<form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/articles/<?= $article->getId(); ?>/comments" method="post">
  <div class="form-group">
    <label for="text">Ваш комментарий</label>
    <textarea name="text" id="text" class="form-control" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Добавить комментарий</button>
</form>

<?php foreach ($comments as $comment) : ?>
  <div id="comment<?= $comment->getId(); ?>" class="mt-3">
    <p><?= $comment->getText() ?></p>
    <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comments/<?= $comment->getId(); ?>/edit" class="btn btn-secondary">Редактировать</a>
  </div>
<?php endforeach; ?>

<?php require(dirname(__DIR__) . '/footer.php'); ?>