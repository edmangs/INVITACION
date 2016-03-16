<?php

namespace AppBackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class InvitationAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('lastname')
            ->add('email')
            ->add('viewed')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('lastname')
            ->add('email')
            ->add('dateInvitation')
            ->add('viewed')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'sendEmail' => array(
                        'template' => 'AppBackendBundle:CRUD:list__action_send_email.html.twig'
                    )
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('lastname')
            ->add('email')
            ->add('dateInvitation', 'sonata_type_datetime_picker', array(
                'format' => 'YYYY/dd/MM HH:MM:SS'
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('lastname')
            ->add('email')
            ->add('dateInvitation')
            ->add('viewed')
            ->add('created')
            ->add('slug')
            ->add('id')
        ;
    }
    
    protected function configureRoutes(RouteCollection $collection){
        $collection
            ->add('sendEmail', $this->getRouterIdParameter().'/send-email')
            ->add('sendAllEmail', 'all/send-email');
    }
}
