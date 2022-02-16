<?php

class Router
{
    public function afficherPage()
    {
        $routes = ["home", "about", "contact"]; //toutes les valeurs de $_GET["page"] acceptées

        $page = "home"; // le nom du fichier qui sera inclus par défaut

        // détermination du nom de fichier à inclure en fonction de $_GET["page"]
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            if (!in_array($page, $routes)) { // on vérifie que la valeur de $_GET["page"] est bien prévue dans le tableau $routes
                $page = "404";
            }
        }
        // on inclut le fichier correspondant à $page
        $file = TEMPLATE_PAGES . "/" . $page . ".php";
        if (file_exists($file)) {
            include $file;
        }
    }
}
