
<?php

// Vérification si l'utilisateur est connecté
//if (!isset($_SESSION['id_login']) || $_SESSION['id_login'] < 1) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    //header("Location: connexion.php");
    //exit;
//}

if(isset($_POST['deconnect'])){
    $_SESSION['id_login'] = 0;
    unset($_SESSION['id_login']);
    session_destroy();
    header('Location: index.php?page=connexion');
}/*elseif(isset($_POST['gestion'])){
    header('Location: index.php?page=gestion');
}else{
    header('Location: index.php?page=visualisation');
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/admin.css">
    <title>Page d'Administration</title>
</head>
<body>


    <main>
        <h2>Bienvenue sur la page d'administration</h2>
        <p>Vous pouvez créer, gérer vos événements et visualiser les données ici.</p>

        <!-- contenu de la page Admin -->
        <form method="GET" action="">

            <div class="button">
                <input type="submit" name="page" value="creer">
            </div>

            <div class="button">
                <input type="submit" name="page" value="Gestion">
            </div>
            
            <div class="button">
                <input type="submit" name="page" value="Visualisation">
            </div>     
        </form>
         

        <form method="POST" action="">
            <input type="submit" name="deconnect" value="Se déconnecter">
        </form>
    </main>

    <footer id="ft1">
        <p>
            Adresse : 11 rue de Faubourg<br>
            Code postal : 67000 Strasbourg<br>
            Télé phone : 00 00 00 00<br>
            E-mail : grmabele@gmail.com   
        </p>
    </footer>         
    
</body>
</html>


