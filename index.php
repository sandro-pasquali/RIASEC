<?php
// Exemple d'architecture MVC très simple en PHP
//
// Les explications sont disponibles sur SlideShare :
// http://fr.slideshare.net/KristenLeLiboux/application-mvc
//
// Pour faire fonctionner ce projet chez vous, vous devez le placer sur
// sur un serveur Apache+PHP et éditer éventuellement la ligne "RewriteBase"
// du fichier .htaccess
//
// Kristen Le Liboux (@novlangue), Juillet 2013

// Ce fichier est le point d'entrée unique du projet
// La requête client se trouve dans le paramètre query
//
// echo $_GET["query"]; die();
//

/**
 * Adresse du root du server
 */
define("ROOT", realpath(__dir__));

/**
 * Adresse du dossier view sur le server
 */
define('VIEW_PATH', ROOT .'/app/view/');

/**
 * Adresse du dossier model sur le server
 */
define('MODEL_PATH', ROOT.'/app/model/');

/**
 * Adresse du dossier controller sur le server
 */
define('CONTROLLER_PATH', ROOT.'/app/controller/');

require_once("./plugins/autoload.php");
require_once("./app/kernel/Kernel.php");
require_once('./app/kernel/token.php');

Kernel::run();
