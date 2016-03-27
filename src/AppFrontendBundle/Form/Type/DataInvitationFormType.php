<?php

namespace AppFrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class DataInvitationFormType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options){
        
        $container = $options["data_container"];
        $em = $container->get("doctrine")->getManager();
        $entities = $em->getRepository("AppModelBundle:DataInvitation")->findAll();
        
        $dataInvitarions = array();
        foreach ($entities as $item) {
            $dataInvitarions[$item->getId()] = $item->getPresentation();
        }
        
        $notBlanck = array(
            new NotBlank(array(
                'message' => 'El campo no puede estar vacío.',
            ))
        );
        
        $builder
            ->add('presentation', "choice", array(
                "label" => "Presentación *",
                "required" => true,
                "constraints" => $notBlanck,
                "choices" => $dataInvitarions
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_container' => null,
            'data_class' => 'AppModelBundle\Entity\DataInvitation'
        ));
    }
}