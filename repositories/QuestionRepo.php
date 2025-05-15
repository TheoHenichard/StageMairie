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
            $tab[] = new Question(
                (int)$question['idQuestion'],
                (int)$question['ordre'],
                (int)$question['idCategorie'],
                $question['textIntro'],
                $question['typeQuestion']
            );
        }
        return $tab;
    }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM question WHERE idCategorie = ?  ORDER BY ORDRE');
        $stmt->execute([$id]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];
        }
        foreach ($questions as $question) {
            $tab[] = new Question(
                (int)$question['idQuestion'],
                (int)$question['ordre'],
                (int)$question['idCategorie'],
                $question['textIntro'],
                $question['typeQuestion']
            );
        }
        return $tab;
    }

}