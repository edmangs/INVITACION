<?php

namespace AppFrontendBundle\Twig;

use Symfony\Bridge\Twig\Form\TwigRendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class AppExtension extends \Twig_Extension
{
    public $renderer;
    private $container;
    private $session;

    public function __construct(TwigRendererInterface $renderer, ContainerInterface $container)
    {
        $this->renderer = $renderer;
        $this->container = $container;
        $this->session = new Session();
    }

    public function getFunctions() {
        return array(
            'getTokens' => new \Twig_Function_Method($this, 'getTokens', array('is_safe' => array('html'))),
        );
    }
    
    public function getTokens(){
        
        $html = "<div class='data-info' "
                . "data-enviroment='".$this->container->get('kernel')->getEnvironment()."' "
                . "</div>";
        
        return $html;
    }
    
    public function getName()
    {
        return $this->container->getParameter('twig.app.name');
    }
}
