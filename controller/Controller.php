<?php
include_once "../bdd/Database.php";
require_once "../model/Question.php";
require_once "../model/Categorie.php";
require_once "../model/Liaison.php";
require_once "../model/Tableau.php";
require_once "../model/Tab.php";
require_once "../model/LigneTableau.php";
require_once "../model/Ligne.php";
require_once "../model/Valeur.php";
require_once "../model/Reponse.php";


require_once '../repositories/CategorieRepo.php';
class Controller
{
    public function __construct(){

    }
     public function CategorieRepo(){

     }

    public function getQuestion(){
        $preparedStatement = "SELECT texte,ordre,typeaffichage,taille,isQuestion,element.idQuestion FROM element INNER JOIN Liaison ON element.idQuestion=Liaison.idQuestion ORDER BY Liaison.ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Question((int)$value['idquestion'],$value['isquestion'],$value['texte'],$value['typeaffichage'],(int)$value['taille'],(int)$value['ordre']);
        }
        return $tab;
    }

    function getLigne(){
        $preparedStatement = "SELECT * FROM Ligne INNER JOIN Liaison ON Ligne.idTab=Liaison.idTab ORDER BY Liaison.ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Ligne((int)$value['idligne'],(int)$value['idtab'],$value['critere'],$value['definition'],$value['texte0'],$value['texte1'],$value['texte2'],$value['texte3'],(int)$value['point'],(int)$value['ordre']);;
        }
        return $tab;
    }

    function getTab(){
        $preparedStatement = "SELECT * FROM BigTableau ORDER BY idTab";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Tab((int)$value['idtab'],$value['titre']);
        }
        return $tab;
    }


    function getLiaison($profil){
        $preparedStatement = "SELECT * FROM liaison JOIN TypeEntretien on Liaison.idTypeE = TypeEntretien.idTypeE WHERE TypeEntretien.type<=$1 ORDER BY ordre";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communication à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement,array($profil));
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Liaison((int)$value['idliaison'],(int)$value['idtab'],(int)$value['idquestion'],(int)$value['identretien'],(int)$value['idreponse'],(int)$value['idtableau'],(int)$value['idcat'],(int)$value['idtypee'],(int)$value['ordre']);;
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
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Categorie((int)$value['idcat'],$value['nom'],$value['ordre'],$value['titre']);
            }
        return $tab;
    }

    function getReponse(){
        $preparedStatement = "SELECT * FROM reponse ORDER BY idQuestion";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Reponse((int)$value['idreponse'],(int)$value['identretien'],(int)$value['idquestion'],$value['reponse'],(int)$value['nbpoint']);
        }
        return $tab;
    }

    function getTableau(){
        $preparedStatement = "SELECT * FROM Tableau";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Tableau((int)$value['idtableau'],$value['entete'],$value['taille']);
        }
        return $tab;
    }


    function getLigneT(){
        $preparedStatement = "SELECT * FROM LigneT";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new LigneTableau((int)$value['idligne'],(int)$value['idtableau'],(int)$value['ordre']);
        }
        return $tab;
    }

    function getValeur(){
        $preparedStatement = "SELECT * FROM Valeur ";;
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $q = array();
        while ($row = pg_fetch_assoc($result)) {
            $q[] = $row;}
        foreach ($q as $key => $value) {
            $tab[] = new Valeur((int)$value['idvaleur'],(int)$value['idlignet'],$value['texte'],$value['place']);
        }
        return $tab;
    }

    function getEntretien($idEmploye){
        $preparedStatement = "SELECT * FROM Entretien WHERE idEmploye=$1";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query_params($connexion, $preparedStatement, array($idEmploye));
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $ligne = array();
        while ($row = pg_fetch_assoc($result)) {
            $ligne[] = $row;

        }
        return $ligne;
    }

    function getEmploye(){
        $preparedStatement = "SELECT * FROM Employe";
        $connexion = Database::getInstance()->getConnection();
        if (!$connexion) {
            die('La communcation à la base de données a echouée : ' . pg_last_error());
        }
        $result = pg_query($connexion, $preparedStatement);
        if (!$result) {
            die("Erreur dans la requête SQL : " . pg_last_error($connexion));
        }
        $ligne = array();
        while ($row = pg_fetch_assoc($result)) {
            $ligne[] = $row;

        }
        return $ligne;}

    public function index()
    {
        $listCategorie = $this->getCategorie();
        $listLigneTab = $this->getLigne();
        $listLiaison = $this->getLiaison(2);
        $listTab = $this->getTab();
        $listTableau = $this->getTableau();
        $listLigne = $this->getLigneT();
        $listVal = $this->getValeur();
        $listQuestion = $this->getQuestion();
        $listReponse = $this->getReponse();
        include '../vue/Entretien.php';
    }
    public function test()
    {
        echo "bonjour";
    }
}