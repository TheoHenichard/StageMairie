<?php
class TableauColonne
{
    public $idTableauColonne;
    public $TableauLigne;
    public $ordre;
    public $texte;
    public $typeColonne;

    public function __construct(array $data){
        if(isset($data['idTableauColonne'])){$this->idTableauColonne = $data['idTableauColonne'];}
        if(isset($data['TableauLigne'])){$this->TableauLigne = $data['TableauLigne'];}
        if(isset($data['ordre'])){$this->ordre = $data['ordre'];}
        if(isset($data['texte'])){$this->texte = $data['texte'];}
        if(isset($data['typeColonne'])){$this->typeColonne = $data['typeColonne'];}
    }

    public function getIdTableauColonne()
    {
        return $this->idTableauColonne;
    }

    public function setIdTableauColonne($idTableauColonne): void
    {
        $this->idTableauColonne = $idTableauColonne;
    }

    public function getTableauLigne()
    {
        return $this->TableauLigne;
    }

    public function setTableauLigne($TableauLigne): void
    {
        $this->TableauLigne = $TableauLigne;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setTexte($texte): void
    {
        $this->texte = $texte;
    }

    public function getTypeColonne()
    {
        return $this->typeColonne;
    }

    public function setTypeColonne($typeColonne): void
    {
        $this->typeColonne = $typeColonne;
    }


}