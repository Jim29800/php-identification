<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identification</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="pages/style.css">
</head>
<body>
    <header class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="?p=accueil">Accueil</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?p=ajout_utilisateur">Inscription</a></li>
                </ul>

            </div>
        </nav>
    </header>
    <section class="container">
        <?= $content ?>
    </section>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>