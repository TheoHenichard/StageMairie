<?php
class TableauLigne
{
    public $idTableauLigne;
    public $tableau;
    public $ordre;
    public $typeLigne;

    public function __construct(array $data){
        if(isset($data['idTableauLigne'])){$this->idTableauLigne = $data['idTableauLigne'];}
        if(isset($data['tableau'])){$this->tableau = $data['tableau'];}
        if(isset($data['ordre'])){$this->ordre = $data['ordre'];}
        if(isset($data['typeLigne'])){$this->typeLigne = $data['typeLigne'];}
    }

    public function getIdTableauLigne()
    {
        return $this->idTableauLigne;
    }

    public function setIdTableauLigne($idTableauLigne): void
    {
        $this->idTableauLigne = $idTableauLigne;
    }

    public function getTableau()
    {
        return $this->tableau;
    }

    public function setTableau($tableau): void
    {
        $this->tableau = $tableau;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getTypeLigne()
    {
        return $this->typeLigne;
    }

    public function setTypeLigne($typeLigne): void
    {
        $this->typeLigne = $typeLigne;
    }

}