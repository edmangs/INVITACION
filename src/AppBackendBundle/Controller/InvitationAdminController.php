<?php

namespace AppBackendBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use AppFrontendBundle\Form\Type\DataInvitationFormType;
use AppModelBundle\Entity\DataInvitation;
use Symfony\Component\HttpFoundation\Request;

class InvitationAdminController extends CRUDController{

    public function sendEmailAction($id, Request $request){
        $users = null;
        $request = $this->container->get("request");
        $em = $this->container->get("doctrine")->getManager();
        
        $user = $em->getRepository("AppModelBundle:Invitation")->findOneBy(array("id" => $id));
        if($id === "all"){
            $users = $em->getRepository("AppModelBundle:Invitation")->findAll();
        }
        
        $form = $this->createForm(new DataInvitationFormType(), new DataInvitation(), array("data_container" => $this->container));
        $form->handleRequest($request);
        
        if($request->getMethod() === "POST"){
            
            if($form->isValid()){
                try {
                    $entity = $em->getRepository("AppModelBundle:DataInvitation")->findOneBy(array("id" => $form->get("presentation")->getData(), "active" => true));
                    if($entity){
                        if($users){
                            foreach ($users as $user) {
                                $send = $this->sendEmail($user, $entity);
                            }
                        }else{
                            $send = $this->sendEmail($user, $entity);
                        }
                        
                        $this->getRequest()->getSession()->getFlashBag()->add("success", "Se envió el correo de forma correcta.");
                    }else{
                        $this->getRequest()->getSession()->getFlashBag()->add("error", "Se presento un problema al enviar el correo electrónico.");
                    }
                } catch (\Exception $e) {
                    $this->getRequest()->getSession()->getFlashBag()->add("error", "Se presento un problema al enviar el correo electrónico.");
                }
            }
                    
        }
        
        
        
        return $this->render("AppBackendBundle:Send:email.user.html.twig", array(
            'user' => $user,
            'users' => $users,
            'form' => $form->createView()
        ));
    }
    
    public function sendEmail($user, $entity) {
        
        $message = \Swift_Message::newInstance()
            ->setSubject($this->getParameter("project_name"))
            ->setFrom($this->getParameter("mailer_user"))
            ->setTo($user->getEmail())
            ->setBody(
                $this->renderView(
                    'AppBackendBundle:Send:message.email.html.twig',
                    array('user' => $user, "entity" => $entity)
                ),
                'text/html'
            );
        
        $this->get('mailer')->send($message);
        
        return true;
    }
}
