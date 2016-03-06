<?php

namespace AppFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller {
    public function indexAction(){
        return $this->render('AppFrontendBundle:Game:game.html.twig');
    }
    
    public function tesureAction(){
        return $this->render('AppFrontendBundle:Game:tesure.html.twig');
    }
}