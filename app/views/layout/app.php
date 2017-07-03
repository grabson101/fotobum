<!DOCTYPE html>
<html lang="pl" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="noodp" name="robots">
    <meta content="noydir" name="robots">
    <title>Twoja nowa aplikacja</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php # include 'app/views/shared/_stylesheet.php'; ?>
    <?php # include 'app/views/shared/_javascript.php'; ?>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/application.css">
  </head>
  <body data-env="<?= Config::get('env') ?>">
    <div id="wrapper" class="container">
      <?php
        include 'app/views/shared/_header.php';

        if($path) {
          include $path;
        } else {
          include 'app/views/shared/404.php';
        }

        include 'app/views/shared/_footer.php';
      ?>
    </div>
  </body>
</html>
