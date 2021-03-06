<?php

/**
 * Class Router
 * Permet de faire le lien entre l'url et le controller et son action associée
 */
class Router {
    /**
     * Analyser l'url en la parsant
     * @param $query string
     * @return array contenant le controller, l'action, les paramètres et le titre de la view
     */
   public static function analyze( $query ) {
      $result = array(
         "controller" => "Error",
         "action" => "error404",
         "title" => "Erreur 404",
         "params" => array()
      );

      if( $query === "" || $query === "/" ) {
         $result["controller"] = "Index";
         $result["title"] = 'Accueil';
         $result["action"] = "display";
      }
      else {
        $parts = explode("/", $query);
        if ($parts[0] == "login" && count($parts) == 1){
            $result["controller"] = "Login";
            $result["title"] = 'Connexion';
            $result["action"] = "display";
        }
        elseif($parts[0] == "login" && count($parts) == 2 && $parts[1] === 'admin') {
            $result["controller"] = "Login";
            $result["title"] = 'Connexion';
            $result["action"] = 'display'.ucfirst($parts[1]);
        }
        elseif($parts[0] == "login" && count($parts) == 3 && $parts[1] === 'admin' && $parts[2] === 'connect') {
            $result["controller"] = "Login";
            $result["title"] = 'Connexion';
            $result["action"] = $parts[2].ucfirst($parts[1]);
        }
        elseif($parts[0] == "login" && count($parts) == 2 && $parts[1] === 'etudiant') {
            $result["controller"] = "Login";
            $result["title"] = 'Connexion';
            $result["action"] = 'display'.ucfirst($parts[1]);
        }
        elseif($parts[0] == "login" && count($parts) == 3 && $parts[1] === 'etudiant' && $parts[2] === 'connect') {
            $result["controller"] = "Login";
            $result["title"] = 'Connexion';
            $result["action"] = $parts[2].ucfirst($parts[1]);
        }
        else if ($parts[0] == "login" && count($parts) == 2 && $parts[1] === 'disconnect'){
            $result["controller"] = "Login";
            $result["title"] = 'Déconnexion';
            $result["action"] = "disconnect";
        }
        elseif($parts[0] == "register" && count($parts) == 2 && $parts[1] === 'etudiant'){
            $result["controller"] = "Register";
            $result["title"] = "S'enregistrer";
            $result["action"] = "display".ucfirst($parts[0]).ucfirst($parts[1]);
        }
        elseif($parts[0] == "register" && count($parts) == 3 && $parts[1] === 'etudiant' && $parts[2] === 'addEtudiant') {
            $result["controller"] = "Register";
            $result["title"] = "Enregistré";
            $result["action"] = $parts[2];
        }
        elseif($parts[0] == "register" && count($parts) == 2 && $parts[1] === 'admin'){
            $result["controller"] = "Register";
            $result["title"] = "Enregistrer Admin";
            $result["action"] = "display".ucfirst($parts[0]).ucfirst($parts[1]);
        }
        elseif($parts[0] == "register" && count($parts) == 3 && $parts[1] === 'admin' && $parts[2] === 'addAdmin') {
            $result["controller"] = "Register";
            $result["title"] = "Enregistré";
            $result["action"] = $parts[2];
        }
        elseif($parts[0] == "register" && count($parts) == 4 && $parts[1] === 'etudiant' && $parts[2] === 'checkCode'){
            $result["controller"] = "Register";
            $result["title"] = "S'enregistrer";
            $result["action"] = $parts[2];
            $result["params"]["codeClasse"] = $parts[3];
        }
        elseif($parts[0] == "register" && count($parts) == 4 && ($parts[1] === 'etudiant'||$parts[1] === 'admin') && $parts[2] === 'checkMail'){
            $result["controller"] = "Register";
            $result["title"] = "S'enregistrer";
            $result["action"] = $parts[2];
            $result["params"]["role"] = $parts[1];
            $result["params"]["mail"] = $parts[3];
        }
        else if ($parts[0] == "questionnaire" && count($parts) == 1){
            $result["controller"] = "Questionnaire";
            $result["title"] = 'Questionnaire';
            $result["action"] = "display";
        }
        else if ($parts[0] == "questionnaire" && count($parts) == 3 && $parts[1] === 'addResultat'){
            $result["controller"] = "Questionnaire";
            $result["title"] = 'Questionnaire';
            $result["action"] = $parts[1];
            $result["params"]["idQuestionnaire"] = $parts[2];
        }
        else if ($parts[0] == "questionnaire" && count($parts) == 2 && $parts[1] === 'edit'){
            $result["controller"] = "Questionnaire";
            $result["title"] = 'Questionnaire';
            $result["action"] = $parts[1];
        }
        else if ($parts[0] == "questionnaire" && count($parts) == 3 && $parts[1] === 'edit'){
            $result["controller"] = "Questionnaire";
            $result["title"] = 'Questionnaire';
            $result["action"] = $parts[1];
            $result["params"]["idGroupe"] = $parts[2];
        }
        else if ($parts[0] == "resultat" && count($parts) == 1){
            $result["controller"] = "Resultat";
            $result["title"] = 'Resultat';
            $result["action"] = 'display';
        }
        else if ($parts[0] == "resultat" && count($parts) == 2 && $parts[1] === 'showEtudiantResultat'){
            $result["controller"] = "Resultat";
            $result["title"] = 'Resultat';
            $result["action"] = $parts[1];
        }
        else if ($parts[0] == "resultat" && count($parts) == 2 && $parts[1] === 'showClasseResultat'){
            $result["controller"] = "Resultat";
            $result["title"] = 'Resultat';
            $result["action"] = $parts[1];
        }
        else if ($parts[0] == "dashboard" && count($parts) == 1){
            $result["controller"] = "Dashboard";
            $result["title"] = 'Dashboard';
            $result["action"] = 'display';
        }
        else if ($parts[0] == "profile" && count($parts) == 1){
            $result["controller"] = "Profile";
            $result["title"] = 'Profil';
            $result["action"] = 'display';
        }
        else if ($parts[0] == "profile" && count($parts) == 2 && $parts[1] === 'editmdp'){
            $result["controller"] = "Profile";
            $result["title"] = 'Profil';
            $result["action"] = $parts[1];
        }
        else if ($parts[0] == "classe" && count($parts) == 1){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] = 'display';
        }
        else if ($parts[0] == "dashboard" && count($parts) == 2 && $parts[1] === 'admin'){
            $result["controller"] = "Admin";
            $result["title"] = 'Dashboard';
            $result["action"] ='display';
        }
        else if ($parts[0] == "dashboard" && count($parts) == 3 && $parts[1] === 'admin' && $parts[2] === 'remove'){
            $result["controller"] = "Admin";
            $result["title"] = 'Dashboard';
            $result["action"] ='remove';
        }
        else if ($parts[0] == "dashboard" && count($parts) == 4 && $parts[1] === 'admin' && $parts[2] === 'reset'){
            $result["controller"] = "Admin";
            $result["title"] = 'Dashboard';
            $result["action"] ='resetMdp';
            $result["params"]["idAdmin"] = $parts[3];
        }
        else if ($parts[0] == "classe" && count($parts) == 2 && $parts[1] === 'remove'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='remove';
        }
        else if ($parts[0] == "classe" && count($parts) == 2 && $parts[1] === 'add'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='addDisplay';
        }
        else if ($parts[0] == "classe" && count($parts) == 3 && $parts[2] =='list'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='displayEtudiants';
            $result["params"]["idClasse"] = $parts[1];
        }
        else if ($parts[0] == "classe" && count($parts) == 2 && $parts[1] == 'stats'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='displayStats';
        }
        else if ($parts[0] == "classe" && count($parts) == 3 && $parts[1] === 'add' && $parts[2] === 'classe'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='addClasse';
        }
        else if ($parts[0] == "classe" && count($parts) == 3 && $parts[1] === 'add' && $parts[2] === 'promo'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='addPromo';
        }
        else if ($parts[0] == "etudiant" && count($parts) == 2 && $parts[1] === 'remove'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='removeEtudiant';
        }
        else if ($parts[0] == "etudiant" && count($parts) == 3 && $parts[1] === 'reset'){
            $result["controller"] = "Classe";
            $result["title"] = 'Classe';
            $result["action"] ='resetMdpEtudiant';
            $result["params"]["idEtudiant"] = $parts[2];
        }
      }
      return $result;
   }
}
