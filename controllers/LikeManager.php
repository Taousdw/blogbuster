<?php



class LikeManager {
    private $pdo;



    public function __construct($pdo) {
      $this->pdo = $pdo;
    }



    public function getLike() {

        $query = $this->pdo->query("SELECT * FROM liker");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    
    }

}
















?>



