<?php

namespace AppFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller {
    public function indexAction($slug){
        return $this->render('AppFrontendBundle:Game:game.html.twig', 
            array("slug" => $slug)
        );
    }
    
    public function tesureAction($slug){
        
        $em = $this->getDoctrine()->getManager();
        $invitation = $em->getRepository("AppModelBundle:Invitation")->findOneBy(array("slug" => $slug));
        $dataInvitation = $em->getRepository("AppModelBundle:DataInvitation")->findOneBy(array("active" => true));
        
        return $this->render('AppFrontendBundle:Game:tesure.html.twig', array(
            "slug" => $slug,
            "invitation" => $invitation,
            "dataInvitation" => $dataInvitation
        ));
    }
}