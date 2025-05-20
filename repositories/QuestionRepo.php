<?php
require_once '../model/Question.php';

class QuestionRepo
{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM question  ORDER BY ORDRE');
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($questions as $question) {
            $q = [];
            $q['idQuestion'] = $question['idQuestion'];
            $q['ordre'] = $question['ordre'];
            $q['textIntro'] = $question['textIntro'];
            $q['typeQuestion'] = $question['typeQuestion'];
            $tab[] = new Question($q);
        }
        return $tab;
    }

    public function getByCategorie(Categorie $categorie){
        $stmt = $this->pdo->prepare('SELECT * FROM question WHERE idCategorie = ?  ORDER BY ORDRE');
        $stmt->execute([$categorie->getIdCategorie()]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];
        }
        foreach ($questions as $question) {
            $q = [];
            $q['idQuestion'] = $question['idQuestion'];
            $q['ordre'] = $question['ordre'];
            $q['textIntro'] = $question['textIntro'];
            $q['typeQuestion'] = $question['typeQuestion'];

            $tab[] = new Question($q);
        }
        return $tab;
    }

}