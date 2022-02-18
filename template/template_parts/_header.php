<header>
    <nav>
        <ul>
            <li><a href="index.php?page=home">Accueil</a></li>
            <li><a href="index.php?page=about">About</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
            <?php if (isset($_SESSION["idUser"])) : ?>
                <li><a href="logout.php">Déconnexion</a></li>
            <?php else : ?>
                <li><a href="index.php?page=connexion">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>