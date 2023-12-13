<?php
require_once('Backoffice/bdd.class.php');
$bdd = new BDD();

// Ons'assure que l'utilisateur est connecté en vérifiant les identifiants. Sinon, il sera redirigé vers la page de connexion.
if (!isset($_SESSION['id_login'])) {
    header("Location: connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/visualisation.css">
    <title>Visualisation des Demandes</title>   
</head>

<body>
    
    <main>

        <section>
            
            <?php
            // Connexion à la base de données
               

                // Requête SQL pour extraire les demandes de contact
                $requete = "SELECT email, message FROM messages";

                $resultat = $bdd->execReq($requete);
                //var_dump($resultat);

                if (count($resultat) > 0) {
                    // Affichage des demandes de contact dans un tableau
                    echo "<table border=2>";
                    echo "<tr><th>Email</th><th>Message</th></tr>";
                    foreach ($resultat as $key=>$value) {
                        echo "<tr>";
                        echo "<td>" . $value['email'] . "</td>";
                        echo "<td>" . $value['message'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Aucune demande de contact pour le moment.";
                }

                // Fermer la connexion à la base de données
                //$connexion->close();
                ?>

        </section>
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
