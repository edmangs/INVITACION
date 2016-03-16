<?php

namespace AppBackendBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Hip\MandrillBundle\Message;
use Hip\MandrillBundle\Dispatcher;

class InvitationAdminController extends CRUDController{

    public function sendEmailAction($id){
        $users = null;
        $request = $this->container->get("request");
        $em = $this->container->get("doctrine")->getManager();
        
        $user = $em->getRepository("AppModelBundle:Invitation")->findOneBy(array("id" => $id));
        if($id === "all"){
            $users = $em->getRepository("AppModelBundle:Invitation")->findAll();
        }
        
        if($request->getMethod() === "POST"){
            
            try {
                $message = new Message();

                $message
                    ->setFromEmail($this->getParameter("mailer_user"))
                    ->setFromName($this->getParameter("project_name"))
                    ->setSubject($this->getParameter("project_name"))
                    ->setHtml('<html><body><h1>Some Content</h1></body></html>');
                
                if($user){
                    $message->addTo($user->getEmail());
                }
                
                $dispatcher = $this->get('hip_mandrill.dispatcher');
                $dispatcher->send($message);
                $this->getRequest()->getSession()->getFlashBag()->add("success", "Se envió el correo de forma correcta.");
            } catch (\Exception $e) {
                $this->getRequest()->getSession()->getFlashBag()->add("error", "Se presento un problema al enviar el correo electrónico.");
            }
                    
        }
        
        return $this->render("AppBackendBundle:Send:email.user.html.twig", array(
            "user" => $user,
            "users" => $users
        ));
    }
}
