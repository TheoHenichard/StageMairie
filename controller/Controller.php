<?php
include_once "../bdd/Database.php";

class Controller
{
    public function __construct(){

    }
    function getQuestion($cat)
    {
        $preparedStatement = "SELECT texte,ordre,typeaffichage,taille,isQuestion,element.idQuestion FROM element INNER JOIN Liaison ON element.idQuestion=Liaison.idQuestion WHERE Liaison.idcat=$1 ORDER BY Liaison.ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement,array($cat));
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $question = array();
        while ($row = pg_fetch_assoc($result)) {
            $question[] = $row;
        }
        return $question;
    }

    function getLigne($tabId){
        $preparedStatement = "SELECT critere,definition,texte0,texte1,texte2,texte3 FROM Ligne INNER JOIN Liaison ON Ligne.idTab=Liaison.idTab WHERE Ligne.idTab=$1 ORDER BY Liaison.ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement, array($tabId));
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $ligne = array();
        while ($row = pg_fetch_assoc($result)) {
            $ligne[] = $row;

        }
        return $ligne;
    }

    function getTab($tabId){
        $preparedStatement = "SELECT idTab,titre FROM Tableau WHERE idTab=$1 ORDER BY idTab";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement,array($tabId));
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $tab = array();
        while ($row = pg_fetch_assoc($result)) {
            $tab[] = $row;
        }
        return $tab;
    }


    function getLiaison($id,$profil){
        $preparedStatement = "SELECT idliaison,idquestion,liaison.identretien,idreponse,idtab,idcat FROM liaison JOIN Entretien ON liaison.idEntretien = Entretien.idEntretien JOIN TypeEntretien on Entretien.idEntretien = TypeEntretien.idEntretien WHERE idCat=$1 AND TypeEntretien.type<=$2 ORDER BY ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communication à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement,array($id,$profil));;
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $tab = array();
        while ($row = pg_fetch_assoc($result)) {

            $tab[] = $row;
        }
        return $tab;
    }

    function getCategorie(){
        $preparedStatement = "SELECT * FROM categorie ORDER BY ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $tab = array();
        while ($row = pg_fetch_assoc($result)) {
            $tab[] = $row;

        }
        return $tab;
    }

    function getReponse($idquestion){
        $preparedStatement = "SELECT * FROM reponse WHERE idQuestion=$1 ORDER BY idQuestion";;
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement,array($idquestion));
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $tab = array();
        while ($row = pg_fetch_assoc($result)) {
            $tab[] = $row;

        }
        return $tab;
    }
}