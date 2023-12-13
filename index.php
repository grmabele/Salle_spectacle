<?php

session_start();

require_once('Backoffice/bdd.class.php');
require_once('Backoffice/message.class.php');
require_once('Backoffice/users.class.php');
include('Pages/menu.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    
    <div id="content">
            <?php
            // Test $_GET est vide

            if(!isset($_GET['page']) || $_GET['page'] == '') $_GET['page'] = 'acceuil'; //$fileimport = 'pages/' .$_GET['page'].' .php';
            $fileimport = 'pages/' . $_GET['page'] . '.php';
            //echo var_dump($fileimport);

            // Test si le fichier existe s
            if(file_exists($fileimport)){
                include($fileimport);
            } else {
                echo "Oups, la page n'est pas disponible.";
            }
            ?>
        </div>
    </body>
</html>