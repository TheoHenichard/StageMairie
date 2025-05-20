<?php
require_once '../model/TypeQuestionRadioCheckbox.php';
class TypeQuestionRadioCheckboxRepo
{
private $pdo;

public function __construct(PDO $pdo){
    $this->pdo = $pdo;
}

    public function getAll(){
        $stmt = $this->pdo->query('SELECT *,qu.idQuestion,qu.idQuestion,qu.ordre,qu.textIntro,qu.typeQuestion FROM TypeQuestionRadioCheckbox tqr JOIN Question qu ON tqr.idQuestion = qu.idQuestion JOIN Categorie ca ON qu.idCategorie = ca.idCategorie JOIN TypeEntretien te ON ca.idTypeEntretien = te.idTypeEntretien');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {

            $typeE = [];
            $typeE['idTypeEntretien'] = $valeur['idTypeEntretien'];
            $typeE['type'] = $valeur['type'];
            $typeE['actif'] = $valeur['actif'];

            $cat = [];
            $cat['idCategorie'] = $valeur['idCategorie'];
            $cat['superCategorie'] = $valeur['superCategorie'];
            $cat['typeEntretien'] = new TypeEntretien($typeE);
            $cat['ordre'] = $valeur['ordre'];
            $cat['nom'] = $valeur['nom'];

            $q = [];
            $q['idQuestion'] = $valeur['idQuestion'];
            $q['categorie']= new Categorie($cat);
            $q['textIntro'] = $valeur['textIntro'];
            $q['typeQuestion'] = $valeur['typeQuestion'];
            $q['ordre'] = $valeur['ordre'];;

            $tab[] = new TypeQuestionRadioCheckbox($valeur);
        }
        return $tab;
    }

    public function getByIdQuestion(Question $question)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM TypeQuestionRadioCheckbox tqr JOIN Question qu ON tqr.idQuestion = qu.idQuestion JOIN Categorie ca ON qu.idCategorie = ca.idCategorie JOIN TypeEntretien te ON ca.idTypeEntretien = te.idTypeEntretien WHERE tqr.idQuestion = ?');
        $stmt->execute([$question->getIdQuestion()]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($valeurs)) {
            return [];
        }
        foreach ($valeurs as $valeur) {

            $typeE = [];
            $typeE['idTypeEntretien'] = $valeur['idTypeEntretien'];
            $typeE['type'] = $valeur['type'];
            $typeE['actif'] = $valeur['actif'];

            $cat = [];
            $cat['idCategorie'] = $valeur['idCategorie'];
            $cat['superCategorie'] = $valeur['superCategorie'];
            $cat['typeEntretien'] = new TypeEntretien($typeE);
            $cat['ordre'] = $valeur['ordre'];
            $cat['nom'] = $valeur['nom'];

            $q = [];
            $q['idQuestion'] = $valeur['idQuestion'];
            $q['categorie'] = new Categorie($cat);
            $q['textIntro'] = $valeur['textIntro'];
            $q['typeQuestion'] = $valeur['typeQuestion'];
            $q['ordre'] = $valeur['ordre'];

            $valeur['question'] = new Question($q);

            $tab[] = new TypeQuestionRadioCheckbox($valeur);
        }
        return $tab;
    }
}