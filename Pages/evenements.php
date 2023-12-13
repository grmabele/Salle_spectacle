<?php
require_once('Backoffice/bdd.class.php');
$bdd = new BDD();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/evenement.css">
    <title>Événements à venir</title>
</head>

<body>
    <main>

        <h1>Événements à venir</h1>

        <section>
            
            <?php
            
            $requete = "SELECT nom_evenement, genre, date_evenement, heure_evenement, description FROM spectacles WHERE date_evenement >= CURDATE() ORDER BY date_evenement";

            $resultat = $bdd->execReq($requete);
            //var_dump($resultat);

            if (count($resultat) > 0) {
                // Affichage des événements dans un tableau
                echo "<table border = 2>";
                echo "<tr><th>Nom de l'événement</th><th>Genre</th><th>Date</th><th>Heure</th><th>Description</th></tr>";
                foreach ($resultat as $key => $value) {
                    echo "<tr>";
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

            // Fermer la connexion à la base de données
            //$connexion->close();
            ?>
        </section>
    </main>

    <footer id="ft1">
        <p>
            Adresse : 11 rue de Faubourg<br>
            Code postal : 67000 Strasbourg<br>
            Téléphone : 00 00 00 00<br>
            E-mail : grmabele@gmail.com
        </p>
    </footer>

</body>
</html>
