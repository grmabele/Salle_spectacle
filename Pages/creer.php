<?php
require_once('Backoffice/bdd.class.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$bdd = new BDD();
$req = "SELECT nom_evenement FROM spectacles";
$res = $bdd->execReq($req);
//var_dump($res);*/

$users = new Users();

if(isset($_POST['envoie'])){
    $evenement = $_POST['evenement'];
    $genre = $_POST['genre'];
    $date_evenement = $_POST['date_evenement'];
    $heure = $_POST['heure'];
    $description = $_POST['description'];

    $users->insert($evenement, $genre, $date_evenement, $heure, $description);
}
/*
if(isset($_POST['envoie'])){
    $users->insert($_POST['genre'],$_POST['heure'],$_POST['date_evenement'],$_POST['evenement'],$_POST['description']);
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/creer.css">
    <title>Document</title>
</head>

<body>

    <main>

        <div class="h1">
            <h1>Formulaire de création d'un nouvel évenement</h1>
        </div>

        <div class="container">

            <form action="" method="post">

                <!--<label for="nom_evenement">Nom evenement:</label><br>
                <input type="text" id="nom_evenement" name="nom" required><br><br>-->

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
                    
                    <!--<label for="description">Description : </label><br>
                    <input type="text" id="description" name="description" required><br><br>-->

                    <div class="input">
                        <span class="appt">Sélectionnez un evenement :</span>
                        <select id="id_evenement" size="1" name="evenement">
                            <option value="">-- Choix --</option>
                            <?php
                            if (count($res) > 0) {
                                foreach ($res as $key => $value) {
                                    echo "<option value='" . $key. "'>" . $value['nom_evenement'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Aucun evenement disponible</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="question">
                    <span class="appt">Description :</span></label>
                    <textarea name="description" id="com" placeholder="Mettez votre description ici"></textarea>
                </div>      

                <button name="envoie"> J'envoie !</button>
               
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








