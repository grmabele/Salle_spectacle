<?php
class Bdd {
    // Paramètres de connexion
    private $conn;

    // Constructeur
    public function __construct($h = 'localhost', $db = 'spectacle', $u = 'root', $pw = '') {
        $host = "127.0.0.1";
        $port = "8889";
        $dbname = "evenements";
        $username = "root";
        $password = "root";
        $socket = "/Applications/MAMP/tmp/mysql/mysql.sock";

        $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8;unix_socket=$socket", $username, $password);
    }

    // Exécute une requête SQL
    public function execReq($req) {
        $startreq = explode(' ', trim($req));

        // Sécuriser la requête
        if ($startreq[0] == 'INSERT' || $startreq[0] == 'UPDATE' || $startreq[0] == 'SELECT') {
            // Exécuter la requête
            $res = $this->conn->query($req);

            // Traiter le résultat
            if ($startreq[0] == 'SELECT') {
                $res = $res->fetchAll();
            }
            if ($startreq[0] == 'INSERT') {
                $res = $this->conn->lastInsertId();
            }

            return $res;
        } else {
            return false;
        }
    }

    // Récupérer des données de la base
    public function select($table, $id, $col) {
        $requete = "SELECT `$col` FROM `$table` WHERE id_users = $id";
        return $this->execReq($requete);
    }

    // Supprimer une entrée de la base
    public function delete($id_evenement) {
        // Échappez l'ID pour éviter les failles de sécurité (je privilégie l'utilisation de requêtes préparées)
        $id_evenement = $this->conn->quote($id_evenement);

        // Requête SQL pour supprimer l'événement
        $requete = "DELETE FROM spectacles WHERE id_evenement = $id_evenement";

        if ($this->execReq($requete)) {
            return "Événement supprimé avec succès.";
        } else {
            return "Erreur lors de la suppression de l'événement.";
        }
    }

    // Modifier une entrée de la base
    public function modifier($table, $id_evenement, $nouvellesDonnees) {
        // Échappez l'ID pour éviter les failles de sécurité (je privilégie l'utilisation de requêtes préparées)
        $id_evenement = $this->conn->quote($id_evenement);

        // Construisez la requête SQL pour mettre à jour les données de l'événement
        $requete = "UPDATE $table SET ";

        if (!empty($nouvellesDonnees)) {
            foreach ($nouvellesDonnees as $colonne => $valeur) {
                $colonne = $this->conn->quote($colonne);
                $valeur = $this->conn->quote($valeur);
                $requete .= "$colonne = $valeur, ";
            }

            $requete = rtrim($requete, ", ");
            $requete .= " WHERE id_evenement = $id_evenement";

            if ($this->execReq($requete)) {
                return "Événement modifié avec succès.";
            } else {
                return "Erreur lors de la modification de l'événement.";
            }
        } else {
            return "Aucune donnée à mettre à jour.";
        }
    }
}

    







