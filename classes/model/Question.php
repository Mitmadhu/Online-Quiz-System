<?php 

namespace Classes\Model;

/**
 * 
 */
class Question
{
	
      public function getQuestion($catId)
      {
        $conn = getConn();
        $sql = $conn->prepare("SELECT * FROM question where category_id = :catId order by rand() limit 10");
        $sql->execute(['catId' => $catId]);
        $res = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $res;

      }

      public function getResult()
      {
          $con = getConn();
          $sql = $con->prepare("SELECT id, answer from question");
          $sql->execute();
          $tempAns = $sql->fetchAll(\PDO::FETCH_ASSOC);

          $unattempted = 0; $correct = 0; $wrong = 0;
          $allAnswers = array();
          foreach ($tempAns as $el) {
            $allAnswers[$el['id']] = $el['answer'];
          }
          
          foreach ($_POST as $id => $value) {
              if($value == 5){
                $unattempted += 1;
                continue;
              }
              if($allAnswers[$id] != $value){
                $wrong += 1;
              }
              else{
                $correct += 1;
              }
          }

          return ['unattempted' => $unattempted, 'correct' => $correct,
           'wrong' => $wrong, 'marks' => $correct * 10];
      }
}



?>