<?php
require_once(MODEL_PATH . "ModelAdministrateur.php");

/**
 * Class AdminController
 */
class AdminController extends Controller {

    /**
     * Afficher le dashboard si on est admin
     * Sinon renvoyer vers la page de login
     */
    public function display() {
        if (estAdmin()) {
            $modelAdmin = new ModelAdministrateur();
            $token = decodeToken($_COOKIE["token"])["data"];
            $this->view->userData = $token;
            // On liste tous les administrateurs et on supprime l'administrateur actuel de la liste
            $this->view->listAdmin = $modelAdmin->selectAll($token['idUser']);
            $this->view->display();
        }else{
            header('Location: ./?query=login/admin'); //redirection d'erreur
        }
    }
    /**
     * Supprimer un administrateur
     * Sinon renvoyer vers la page de login
     */
    public function remove(){
        if (estAdmin()) {
            if (isset($_POST)) {
                $modelAdministrateur = new ModelAdministrateur();
                foreach ($_POST as $key => $value) {
                    $modelAdministrateur->deleteById($key);
                }
                header('Location: ./?query=dashboard/admin');
            }
        }else{
            header('./?query=login/admin');//Redirection d'erreur
        }
    }
    /**
     * Reinitialiser un mot de passe
     * Sinon renvoyer vers la page de login
     */
    public function resetMdp(){
        if (estAdmin()) {
            $modelAdministrateur = new ModelAdministrateur();
            $newMdp = 'admin';
            $newMdp = crypt($newMdp,'$5$rounds=5000$anexamplestringforsalt$');
            $modelAdministrateur->editMdpAdmin($newMdp,$this->route["params"]["idAdmin"]);
            header('Location: ./?query=dashboard/admin');
        }else{
            header('./?query=login/admin');//Redirection d'erreur
        }
    }
}