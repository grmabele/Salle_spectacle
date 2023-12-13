
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = new Message();

if(isset($_POST['envoie'])){
    $message->insert($_POST['email'],$_POST['message']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/contact.css">
    <title>Document</title>
</head>

<body>

    <main>
        <h1>Formulaire de contact</h1>

        <div class="container">

            <form action="" method="post">

               <input type="email" name="email" placeholder="email">
               <textarea name="message" placeholder="Ecrire message" cols="30" rows="10"></textarea>
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







