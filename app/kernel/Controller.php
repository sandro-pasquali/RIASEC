<?php

/**
 * Class Controller
 */
class Controller {
    /**
     * @var
     */
   protected $route;
    /**
     * @var View
     */
   protected $view;

    /**
     * Controller constructor.
     * @param $route
     */
   public function __construct( $route ) {
      $this->route = $route;
      $this->view = new View( $route );
      $this->view->title = $route["title"];
   }

}
