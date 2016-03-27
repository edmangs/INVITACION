<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\Invitation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesInvitacion extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 2;
    }

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        
        $em = $this->container->get('doctrine')->getEntityManager();
        
        
        $entities = array(
            array('name' => "Edwin Eduardo", "lastname" => "Gutierrez Cervera", "email" => "edwine.gutierrezc@utadeo.edu.co")
        );
        
        foreach ($entities as $entity) {
            $object = new Invitation();
            
            $object->setName($entity["name"]);
            $object->setLastname($entity["lastname"]);
            $object->setEmail($entity["email"]);
            
            $manager->persist($object);
            $this->addReference('user_invitation_'.$entity['name'], $object);
        }
        $manager->flush();
    }

}

?>