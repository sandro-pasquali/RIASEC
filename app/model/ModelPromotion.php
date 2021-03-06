<?php
require_once("Model.php");

/**
 * Class ModelPromotion
 */
class ModelPromotion extends Model{

    /**
     * @var string nom de la clé primaire de la table
     */
  protected $pk_key = "promotion_id";

    /**
     * @var string nom de la table
     */
  protected $table  = "Promotion";

  /**
  * Créer une promotion
  * @param string $newAnneeDiplome année correspondant à la promotion créée
  **/
   public function createPromotion($newAnneeDiplome){
    try{
      $sql = 'INSERT INTO '.$this->table.'(anneeDiplome) VALUES(:anneeDiplome)';
      $req = $this->query($sql,array(':anneeDiplome'=> $newAnneeDiplome));
    }
    catch(PDOException $e){
      echo($e->getMessage());
      die("<br> Erreur lors de la création d'une promotion dans la table " . $this->table);
    }
  }

  /**
  * Modification de l'année associée à la promotion
  * @param string $newAnneeDiplome nouvelle annee
  * @param int $idPromotion id de la promotion à modifier
  **/
   public function editAnneeDiplome($newAnneeDiplome, $idPromotion){
    try{
      $sql = 'UPDATE '.$this->table.' SET anneeDiplome = :newAnnee WHERE '.$this->pk_key.' = :idPromotion';
      $req = $this->query($sql,array(":newAnnee"=> $newAnneeDiplome,
                                    ":idPromotion"=>$idPromotion));
    }
    catch(PDOException $e){
      echo($e->getMessage());
      die("<br> Erreur lors de la modification de l'année de la promotion " . $this->table);
    }
  }
}
?>
