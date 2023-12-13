<?php
require_once('Backoffice/bdd.class.php');
$bdd = new BDD();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$users = new Users();

if (isset($_POST['envoie'])) {
    $evenement = $_POST['evenement'];
    $genre = $_POST['genre'];
    $date_evenement = $_POST['date_evenement'];
    $heure = $_POST['heure'];
    $description = $_POST['description'];

    $users->insert($evenement, $genre, $date_evenement, $heure, $description);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/creer.css">
    <title>Modifier un événement</title>
</head>
<body>
    <main>
        <div class="h1">
            <h1>Formulaire de modification d'un événement</h1>
        </div>

        <div class="container">
            <form action="" method="post">
                <div class="question">
                    <div class="input">
                        <label for="genre"><span class="appt">Genre :</span></label><br>
                        <input type="text" id="genre" name="genre" required><br><br>
                    </div>

                    <div class="input">
                        <label for="heure_evenement"><span class="appt">Heure : </span></label>
                        <input type="time" name="heure" id="heure_evenement">
                    </div>
                    
                    <div class="input">
                        <label for="date_evenement"><span class="appt">Date : </span></label>
                        <input type="date" name="date_evenement" id="date_evenement" value="yyy-MM-dd" min="2023-01-01" max="2030-12-31" required><br><br>
                    </div>

                    <div class="input">
                        <span class="appt">Sélectionnez un événement :</span>
                        <select id="id_evenement" size="1" name="evenement">
                            <option value="">-- Choix --</option>
                            <?php
                            // Récupérez la liste des événements à partir de la base de données
                            $req = "SELECT nom_evenement FROM spectacles";
                            $res = $bdd->execReq($req);

                            if (count($res) > 0) {
                                foreach ($res as $key => $value) {
                                    echo "<option value='" . $key. "'>" . $value['nom_evenement'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Aucun événement disponible</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="question">
                    <span class="appt">Description :</span></label>
                    <textarea name="description" id="com" placeholder="Mettez votre description ici"></textarea>
                </div>

                <button name="envoie">Modifier l'événement</button>
            </form>
        </div>
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
