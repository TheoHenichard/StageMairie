<?php

class Element
{
    public $idQuestion;
    public $isQuestion;
    public $texte;
    public $typeaffichage;
    public $taille;

    /**
     * @param $idQuestion
     * @param $isQuestion
     * @param $texte
     * @param $typeaffichage
     * @param $taille
     */
    public function __construct($idQuestion, $isQuestion, $texte, $typeaffichage, $taille)
    {
        $this->idQuestion = $idQuestion;
        $this->isQuestion = $isQuestion;
        $this->texte = $texte;
        $this->typeaffichage = $typeaffichage;
        $this->taille = $taille;
    }

}