<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="src/view/skin/global.css" />
    <link rel="stylesheet" href="src/view/skin/message.css" />
</head>

<body>
    <nav>
        <ul class="menu">
            <?php if (isset($menu)) echo $menu; ?>
        </ul>
    </nav>
    <main>
        <div class="message">
            <h1>Contact</h1>
            <?php
            if (isset($content["message"])) {
                if ($content["message"] == "success")
                    echo '<p class="success">Votre message a bien été envoyé.</p>';
                else if ($content["message"] == "error")
                    echo '<p class="success">Il y a eu un problème dans l\'envoi de votre message.</p>';
            }
            ?>
        </div>
    </main>
    <footer>
        <span>Copyright © 2021 Mon-super-site.fr</span>
    </footer>
</body>

</html>