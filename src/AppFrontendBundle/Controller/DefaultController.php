<?php

namespace AppFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if($this->container->get('security.context')->isGranted('ROLE_PERIODISTA')){
            return $this->redirect($this->generateUrl("app_frontend_dashboard_home"));
        }
        
        return $this->render('AppFrontendBundle:Default:index.html.twig');
    }
    
    public function passwordRecoveryAction() {
        $user = $this->getUser();
        $is_super_admin = false;
        foreach ($user->getRoles() as $rol) {
            if ($rol == 'ROLE_SONATA_ADMIN') {
                $is_super_admin = true;
            }
        }
        if ($is_super_admin) {
            return $this->redirect($this->generateUrl('sonata_admin_dashboard'));
        } else {
            return $this->redirect($this->generateUrl('app_frontend_homepage'));
        }
    }
}
