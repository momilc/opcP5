<?php
use \Tutoriel\HTML\BootstrapForm;
use \Tutoriel\Autoloader;
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <?php
    //Autoloader

    require 'class/Autoloader.php';
    Autoloader::register();
    $form = new BootstrapForm($_POST);
    ?>

    <form action="#" method="POST">
        <?php
        echo $form->input('username');
        echo $form->input('password');
        echo $form->submit();
        ?>
    </form>
    </body>
    </html>



