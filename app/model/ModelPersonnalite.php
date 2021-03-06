<?php
require_once("Model.php");

/**
 * Class ModelPersonnalite
 */
class ModelPersonnalite extends Model{

    /**
     * @var string nom de la clé primaire de la table
     */
  protected $pk_key = "personnalite_id";

    /**
     * @var string nom de la table
     */
  protected $table  = "Personnalite";

  /**
  * Editer la description d'une personnalité
  * @param int $idPersonnalite identifiant une personnalité de manière unique
  * @param string $newDescription remplacer par une nouvelle description
  **/
  public function editDescription($idPersonnalite,$newDescription){
    try{
      $sql = 'UPDATE '.$this->table.' SET description = :newDescription
                                     WHERE '.$this->pk_key.' = :idPersonnalite';

      $req = $this->query($sql,array(":idPersonnalite"=>$idPersonnalite,
                                     ":newDescription" => $newDescription));
    }
    catch (PDOException $e)
    {
      echo($e->getMessage());
      die("<br> Erreur lors de la modification de la description du profil " . $this->table);
    }
  }
}
?>
