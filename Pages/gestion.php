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
    <link rel="stylesheet" type="text/css" href="CSS/gestion.css">
    <title>Gestion des Événements</title>
</head>

<body>
   
    <main>

        <h1>Gestion des Événements</h1>
        <section>
            
            <form method="post" action="">
                <!-- Formulaire pour ajouter un nouvel événement -->
            </form>
        </section>
        <section>
            
            <?php
            $requete = "SELECT nom_evenement, genre, date_evenement, heure_evenement, description FROM spectacles WHERE date_evenement >= CURDATE() ORDER BY date_evenement";

            $resultat = $bdd->execReq($requete);
            //var_dump($resultat);

            if (count($resultat) > 0) {
                // Affichage des événements dans un tableau
                echo "<table border = 2>";
                echo "<tr><th>Supprimer</th><th>Modifier</th><th>Nom de l'événement</th><th>Genre</th><th>Date</th><th>Heure</th><th>Description</th></tr>";
                foreach ($resultat as $key => $value) {
                    echo "<tr>";
                    echo "<td><a href='Pages/delete.php'>supprimer</a></td>";
                    echo "<td><a href='index.php?page=modifier'>modifier</a></td>";
                    echo "<td>" . $value['nom_evenement'] . "</td>";
                    echo "<td>" . $value['genre'] . "</td>";
                    echo "<td>" . $value['date_evenement'] . "</td>";
                    echo "<td>" . $value['heure_evenement'] . "</td>";
                    echo "<td>" . $value['description'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Aucun événement à venir pour le moment.";
            }

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
