<?php

// D'abord on vas identifier ma liste des users. On vas juste récupérer tout ce qu'il y a dans ma BD


class Users {

    private $tbl = "spectacles";
    private $id = "";
    

    public function __construct($myid = "vide"){
        if($myid !="vide") $this->id = $myid;
        else $this->id =$myid;

    }

    public function selecAll(){
        $bdd = new BDD();
        return $bdd->execReq("SELECT * FROM ". $this->tbl);
    }

    public function get($col, $id){
        $bdd = new BDD();
        return $bdd->select($this->tbl, $id, $col);

    }

    public function set($col, $value, $id){
        $bdd = new BDD();
        return $bdd->setUpdate($this->tbl, $id, $col, $value);

    }

    public function insert($evenement, $genre, $date_evenement, $heure, $description){
        $bdd = new BDD();
        /*$message = str_replace("'","''",$message);*/

        return $bdd->execReq("INSERT INTO $this->tbl (`nom_evenement`,`genre`,`date_evenement`,`heure_evenement`,`description`) VALUES ('$evenement','$genre','$date_evenement','$heure','$description')");
    }
}

// Pour executer une requete il faut une nvelle objet
// Faire un upadate c'est faire des set()

// Il nous faut un id dans la function get($col, $id) pour savoir quel enregistrement dans la BD qu'il faut renseigner

// firstname correspond à la colonne
?>