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
        <div>
            <?php echo $content ?>
        </div>
        <section>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus.</article>
        </section>
    </main>
    <footer>
        <span>Copyright © 2021 Mon-super-site.fr</span>
    </footer>
</body>

</html>