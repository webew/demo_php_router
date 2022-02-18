<?php
session_start();
require_once "config/config.php"; // charge le fichier et empêche de le charger une 2éme fois
var_dump($_SESSION);
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

    <?php
    if (isset($_POST["formConnexion"])) {
        var_dump($_POST);
        $pdo = new PDO("mysql:host=localhost;port=3307;dbname=test;charset=utf8", "toto", "toto");
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email=:email");
        $stmt->bindParam("email", $_POST["email"]);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($user);
        if ($user) {
            $pwdOk = password_verify($_POST["password"], $user["pwd"]);
            var_dump($pwdOk);
            if ($pwdOk) {
                $_SESSION["idUser"] = $user["id"];
            }
        }
    }
    ?>

    <form action="index.php" method="POST">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit" name="formConnexion" value="Envoyer">
    </form>

    <main>
        <?php
        $routes = ["home", "about", "contact", "admin"]; //toutes les valeurs de $_GET["page"] acceptées

        $page = "home"; // le nom du fichier qui sera inclus par défaut

        // détermination du nom de fichier à inclure en fonction de $_GET["page"]
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            if ($_GET["page"] === "admin") {
                if (isset($_SESSION["idUser"])) {
                    $page = "admin";
                } else {
                    $page = "home";
                }
            }
            if (!in_array($page, $routes)) { // on vérifie que la valeur de $_GET["page"] est bien prévue dans le tableau $routes
                $page = "404";
            }
        }
        // on inclut le fichier correspondant à $page
        $file = TEMPLATE_PAGES . "/" . $page . ".php";
        if (file_exists($file)) {
            include $file;
        }
        ?>
    </main>

    <footer>
        FOOTER
    </footer>

</body>

</html>