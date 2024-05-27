<?php require(dirname(__DIR__) . '/header.php');
foreach ($articles as $article) :
?>
  <div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/<?= $article->getId(); ?>"><?= $article->getName(); ?></a></h5>
      <p class="card-text"><?= $article->getText(); ?></p>
    </div>
  </div>
<?php
endforeach;
require(dirname(__DIR__) . '/footer.php');
?>