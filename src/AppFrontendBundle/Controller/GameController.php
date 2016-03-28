<?php

namespace AppFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller {
    public function indexAction($slug){
        return $this->render('AppFrontendBundle:Game:game.html.twig', 
            array("slug" => $slug)
        );
    }
    
    public function tesureAction($slug){
        
        if(!$slug){
            $this->getRequest()->getSession()->getFlashBag()->add("error", "No existe un usuario al cual presentarle la invitación.");
            
            return $this->redirect($this->generateUrl("app_frontend_game_index"));
        }
        
        $em = $this->getDoctrine()->getManager();
        $invitation = $em->getRepository("AppModelBundle:Invitation")->findOneBy(array("slug" => $slug));
        $dataInvitation = $em->getRepository("AppModelBundle:DataInvitation")->findOneBy(array("active" => true));
        
        return $this->render('AppFrontendBundle:Game:tesure.html.twig', array(
            "slug" => $slug,
            "invitation" => $invitation,
            "dataInvitation" => $dataInvitation
        ));
    }
    
    public function userViewInvitationAction($slug) {
        
        $em = $this->getDoctrine()->getManager();
        $invitation = $em->getRepository("AppModelBundle:Invitation")->findOneBy(array("slug" => $slug));
        $response = new Response;
        
        $response->headers->set('Content-Type', 'application/json');
        
        if($invitation){
            $invitation->setViewed(true);
            
            $em->persist($invitation);
            $em->flush();
            
            $response = new Response(json_encode(array('ok' => true)));
            return $response;
        }
        
        $response = new Response(json_encode(array('error' => true)));
        return $response;
    }
}