<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="src/view/skin/global.css" />
    <link rel="stylesheet" href="src/view/skin/home.css" />
</head>

<body>
    <nav>
        <ul class="menu">
            <?php if (isset($menu)) echo $menu; ?>
        </ul>
    </nav>
    <main>
        </div>
        <section>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
        </section>
    </main>
    <footer>
        <div class="contact">
            <h1>Contact</h1>
            <?php
            if (isset($content["error"]))
                echo '<h3>Il y a eu un problème lors de l\'envoi de votre message.</h3>'
            ?>
            <form class="form" method="POST" action="?a=contact">
                <div class="field">
                    <input id="prenom" type="text" name="prenom" required><br>
                    <span></span>
                    <label for="prenom">Prenom</label>
                </div>
                <div class="field">
                    <input id="nom" type="text" name="nom" required><br>
                    <span></span>
                    <label for="nom">Nom</label>
                </div>
                <div class="field">
                    <input id="mail" type="email" name="mail" required><br>
                    <span></span>
                    <label for="mail">Adresse mail</label>
                </div>
                <label for="message">Votre message</label>
                <textarea id="message" name="message" rows="7" cols="60" maxlength="4095" required></textarea>
                <button type="submit" name="submit" class="submit">Envoyer</button>
            </form>
            <div>
                <hr>
                <span>Copyright © 2021 Mon-super-site.fr</span>
    </footer>
</body>

</html>