<?php
class Tab{
    public $idTab;
    public $titre;

    public function __construct($idTab, $titre)
    {
        $this->idTab = $idTab;
        $this->titre = $titre;
    }

    public function getIdTab()
    {
        return $this->idTab;
    }

    public function setIdTab($idTab): void
    {
        $this->idTab = $idTab;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }


}