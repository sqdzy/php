<?php require(dirname(__DIR__) . '/header.php'); ?>
<form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/store" method="POST">
  <div class="form-group">
    <label for="title">Title article</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="text">Text article</label>
    <textarea name="text" id="text" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require(dirname(__DIR__) . '/footer.php'); ?>