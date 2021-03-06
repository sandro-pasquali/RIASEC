<?php
require_once(MODEL_PATH . "ModelEtudiant.php");
require_once(MODEL_PATH . "ModelAdministrateur.php");
require_once(MODEL_PATH . "ModelClasse.php");
require_once(MODEL_PATH . "ModelDepartement.php");
require_once(MODEL_PATH . "ModelPromotion.php");

use \Firebase\JWT\JWT;

/**
 * Class ProfileController
 */
class ProfileController extends Controller {

    /**
     * Afficher le progil de l'étudiant ou de l'administrateur connecté
     * Sinon renvoyer vers la page de login si l'utilisateur n'est pas connecté
     */
    public function display() {
        if (estEtudiant()) {
            $modelEtudiant = new ModelEtudiant();
            $modelClasse = new ModelClasse();
            $modelDepartement = new ModelDepartement();
            $modelPromotion = new ModelPromotion();
            $token = decodeToken($_COOKIE["token"])['data'];
            $this->view->userData = $token;
            $idEtudiant = $token["idUser"];
            $etudiant =$modelEtudiant->selectById($idEtudiant);
            unset($etudiant['mdp'],$etudiant[5]); //Supprimer le mot de passe du array pour pas le redescendre dans la vue

            //On cherche son département et sa promotion
            $classe = $modelClasse->selectById($etudiant['classe_id']);
            $departement = $modelDepartement->selectById($classe['departement_id'])['libelle'];
            $promotion = $modelPromotion->selectById($classe['promotion_id'])['anneeDiplome'];
            $etudiant['promotion'] = $promotion;
            $etudiant['departement'] = $departement;
            $this->view->user = $etudiant;
            $this->view->questionnaireRealise = $etudiant["personnalite_id"];
            $this->view->display();
        }
        else if (estAdmin()){
            $modelAdmin = new ModelAdministrateur();
            $token = decodeToken($_COOKIE["token"])['data'];
            $this->view->userData = $token;
            $idAdmin = $token["idUser"];
            $admin =$modelAdmin->selectById($idAdmin);
            unset($admin['mdp'],$admin[5]);
            $this->view->user = $admin;
            $this->view->display();
        }
        else{
            header('Location: ./?query=login');
        }
   }

    /**
     * Editer le mot de passe pour un étudiant ou un administrateur qui est connecté
     * Sinon renvoyer vers la page de login
     */
   public function editMdp(){
       if (estEtudiant()) {
           if(isset($_POST['mdp'])){
               $modelEtudiant = new ModelEtudiant();
               $token = decodeToken($_COOKIE["token"])["data"];
               $newMdp = htmlspecialchars(trim($_POST['mdp']));
               $newMdp = crypt($newMdp,'$5$rounds=5000$anexamplestringforsalt$');
               $modelEtudiant->editMdpEtudiant($newMdp,$token['idUser']);
               header('Location: ./');
           }
           else{
               header('Location: ./?query=profile');
           }
       }
       else if(estAdmin()){
           if(isset($_POST['mdp'])) {
               $modelAdmin = new ModelAdministrateur();
               $token = decodeToken($_COOKIE["token"])["data"];
               $newMdp = htmlspecialchars(trim($_POST['mdp']));
               $newMdp = crypt($newMdp, '$5$rounds=5000$anexamplestringforsalt$');
               $modelAdmin->editMdpAdmin($newMdp, $token['idUser']);
               header('Location: ./');
           }else{
               header('Location: ./?query=profile');
           }
       }
       else{
           header('Location: ./?query=login');
       }
   }
}