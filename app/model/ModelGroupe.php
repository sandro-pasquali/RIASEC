<?php
require_once("Model.php");

/**
 * Class ModelGroupe
 */
class ModelGroupe extends Model{

    /**
     * @var string nom de la clé primaire de la table
     */
  protected $pk_key = "groupe_id";

    /**
     * @var string nom de la table
     */
  protected $table  = "Groupe";


}
?>
