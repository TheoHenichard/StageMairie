<?php
class Valeur{
    public $idvaleur;
    public $idlignetableau;
    public $texte;
    public $place;

    public function __construct($idvaleur, $idlignetableau, $texte, $place)
    {
        $this->idvaleur = $idvaleur;
        $this->idlignetableau = $idlignetableau;
        $this->texte = $texte;
        $this->place = $place;
    }

    public function getIdvaleur()
    {
        return $this->idvaleur;
    }

    public function setIdvaleur($idvaleur): void
    {
        $this->idvaleur = $idvaleur;
    }

    public function getIdlignetableau()
    {
        return $this->idlignetableau;
    }

    public function setIdlignetableau($idlignetableau): void
    {
        $this->idlignetableau = $idlignetableau;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setTexte($texte): void
    {
        $this->texte = $texte;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function setPlace($place): void
    {
        $this->place = $place;
    }


}