<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="src/view/skin/global.css" />
    <link rel="stylesheet" href="src/view/skin/auth.css" />
</head>

<body>
    <nav>
        <ul class="menu">
            <?php if (isset($menu)) echo $menu; ?>
        </ul>
    </nav>
    <main>
        <div class="centre">
            <h1>Connexion</h1>
            <?php
            if (isset($content["error"])) {
                echo '<div class=error>Mauvais login ou mot de passe.</div>';
            }
            ?>
            <form class="form" method="POST" action="?o=connexion&amp;a=connexion">
                <div class="field">
                    <input id="mail" type="text" name="mail" <?php if (isset($content["mail"])) echo ('value="' . $content["mail"] . '"') ?> maxlength="32" required><br>
                    <span></span>
                    <label for="mail">Adresse mail</label>
                </div>
                <div class="field">
                    <input id="password" name="password" type="password" <?php if (isset($content["password"])) echo ('value="' . $content["password"] . '"') ?> required><br>
                    <span></span>
                    <label for="password">Mot de passe</label>
                </div>
                <div class="link">
                    <a href="?o=auth&a=inscription">Pas de compte ?</a>
                </div>
                <button type="submit" name="submit" class="submit">Se connecter</button>
            </form>
        </div>
    </main>
    <footer>
        <span>Copyright © 2021 Mon-super-site.fr</span>
    </footer>
</body>

</html>