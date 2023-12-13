
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
    <title>MENU</title>
    
</head>
<body>
    <header class="main-head">
        <nav>
            <h1 id="logo">Sal'Event</h1>
            <ul>
                <li><a href="index.php?page=acceuil">Accueil</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
                <li><a href="index.php?page=evenements">Evenements</a></li>
                <?php if(!isset($_SESSION['id_login'])) { ?>
                    <li><a href="index.php?page=connexion">Connexion</a></li>
                <?php } else { ?>
                    <li><a href="index.php?page=admin">Admin</a></li>
                    <!--<li><a href="index.php?page=gestion">Gestion</a></li>
                    <li><a href="index.php?page=visualisation">Visualisation</a></li>-->
                <?php } ?>
            </ul>
        </nav>
    </header>
 
</body>
