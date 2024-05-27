<?php require(dirname(__DIR__) . '/header.php'); ?>
<form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/update/<?= $article->getId(); ?>" method="POST">
  <div class="form-group">
    <label for="title">Title article</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $article->getName(); ?>">
  </div>
  <div class="form-group">
    <label for="text">Text article</label>
    <textarea name="text" id="text" class="form-control"><?= $article->getText(); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php require(dirname(__DIR__) . '/footer.php'); ?>