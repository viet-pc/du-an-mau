<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://kit.fontawesome.com/c212fbd740.js" crossorigin="anonymous"></script>
    <link href="<?= PUBLIC_URL . '/contents/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/css/bootstrap.min.css' ?>" rel="stylesheet" />

    <script src="<?php echo PUBLIC_URL . '/contents/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/js/bootstrap.min.js' ?>"></script>
    <link rel="stylesheet" href="<?php echo PUBLIC_URL . '/css/admin.css' ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <br>
        <?php
        require_once("block_admin/header.php");
        require_once("block_admin/nav.php");
        echo '<div class="box">';
        if (isset($data['message']) != '') {
            echo '<span class="message">' . $data['message'] . '</span>';
        }

        if (isset($data['page'])) {
            require_once('block_admin/' . $data['page'] . '.php');
        } else {
            require_once('block_admin/home.php');
        }
        echo '</div>';
        ?>
    </div>
</body>
<script src="<?php echo PUBLIC_URL . '/js/admin.js' ?>"></script>

</html>