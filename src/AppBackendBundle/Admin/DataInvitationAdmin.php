<?php

namespace AppBackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DataInvitationAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('livingRoom')
            ->add('dataInvitation')
            ->add('hosts')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('livingRoom')
            ->add('dataInvitation')
            ->add('presentation')
            ->add('active')
            ->add('hosts')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
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
            ->add('livingRoom')
            ->add('presentation')
            ->add('active')
            ->add('dataInvitation', 'sonata_type_datetime_picker', array(
                'dp_language'=>'es',
                'format'=>'dd/MM/yyyy HH:mm:ss'
            ))
            ->add('hosts')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('livingRoom')
            ->add('dataInvitation')
            ->add('hosts')
            ->add('created')
            ->add('updated')
            ->add('id')
        ;
    }
    
    public function validate(\Sonata\AdminBundle\Validator\ErrorElement $errorElement, $object) {
        parent::validate($errorElement, $object);
        $em = $this->getConfigurationPool()->getContainer()->get("doctrine")->getManager();
        
        $dataInvitation = $em->getRepository("AppModelBundle:DataInvitation")->findBy(array("active" => true));
        if(count($dataInvitation) > 1 && $object->getActive() === true){
            $errorElement
                ->addViolation("No se pueden tener mas de una invitación activa");
        }
    }
    
}
