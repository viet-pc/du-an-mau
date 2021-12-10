<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> viet-pham</title>
  <link rel='shortcut icon' href='<?php echo  PUBLIC_URL . '/img/icon.png' ?>' />

  <script src="https://kit.fontawesome.com/c212fbd740.js" crossorigin="anonymous"></script>
  <link href="<?= PUBLIC_URL ?>/contents/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/css/bootstrap.min.css" rel="stylesheet" />



  <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/index.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?= PUBLIC_URL ?>/js/index.js"></script>
</head>

<body>
  <?php if (!empty($data['message']))
    require_once('blocks/message.php');
  ?>

  <?php require_once('blocks/nav.php') ?>
  <?php require_once('blocks/header.php') ?>

  <div class="container">
    <?php
    require_once('blocks/search.php');

    if (!empty($data['blocks'])) {
      foreach ($data['blocks'] as $value) {
        require_once('blocks/' . $value . '.php');
      }
    }
    ?>
  </div>
  <?php require_once('blocks/footer.php'); ?>
</body>

</html>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= PUBLIC_URL ?>/contents/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>