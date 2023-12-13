<?php
/*var_dump($_SESSION['id_login']);*/

if(isset($_POST['validation'])){
    $id = $_POST['login'];
    $pwd = $_POST['password'];

    // Vérification des informations d'identification 
    if($id == "admin" && $pwd == "admin"){
        $_SESSION['id_login'] = 12;
        header("Location: index.php?page=admin"); // Redirige vers la page admin
        exit;
    } else {
        // Identifiants incorrects, affiche un message d'erreur
        $error_message = "Identifiants incorrects. Veuillez réessayer.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <main class="container">
        <form method="POST" action="">
            <div class="login-form">
                <h2>Connexion</h2>
                <?php if (isset($error_message)) { ?>
                    <p style="color: red;"><?php echo $error_message; ?></p>
                <?php } ?>
                <div class="input">
                    <label for="id_login">Login : </label>
                    <input type="text" name="login" id="id_login" required>
                </div>
                <div class="input">
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="button">
                    <input type="submit" name="validation" value="Se connecter">
                </div>
            </div>
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
