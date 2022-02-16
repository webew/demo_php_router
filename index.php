<?php
require_once "config/config.php"; // charge le fichier et empêche de le charger une 2éme fois
require_once "classes/Router.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include TEMPLATE_PARTS . "/_header.php";
    ?>

    <main>
        <?php
        $router = new Router();
        $router->afficherPage();
        ?>
    </main>

    <footer>
        FOOTER
    </footer>

</body>

</html>