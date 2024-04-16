<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php if (isset($_GET['p']) && $_GET['p']=='view') echo '<li class="nav-item active">'; else  '<li class="nav-item">';?>
        <a class="nav-link" href="?p=view">View<span class="sr-only">(current)</span></a>
      </li>
      <?php if (isset($_GET['p']) && $_GET['p']=='add') echo '<li class="nav-item active">'; else  '<li class="nav-item">';?>
        <a class="nav-link" href="?p=add">Add</a>
      </li>
      <?php if (isset($_GET['p']) && $_GET['p']=='update') echo '<li class="nav-item active">'; else  '<li class="nav-item">';?>
        <a class="nav-link" href="?p=update">Update</a>
      </li>
      <?php if (isset($_GET['p']) && $_GET['p']=='delete') echo '<li class="nav-item active">'; else  '<li class="nav-item">';?>
        <a class="nav-link" href="?p=delete">Delete</a>
      </li>
    </ul>
  </div>
</nav>
      </header>
      <main>
