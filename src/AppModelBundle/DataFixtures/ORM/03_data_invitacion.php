<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\DataInvitation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DateTime;

class FixturesDataInvitacion extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 3;
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
            array('livingRoom' => "Modulo 7A 302", "presentation" => "presentacion de pensar complejo", "active" => true)
        );
        
        foreach ($entities as $entity) {
            $object = new DataInvitation();
            
            $object->setLivingRoom($entity["livingRoom"]);
            $object->setDataInvitation(DateTime::createFromFormat('Y-m-d H:i:s', '2016-04-09 09:00:00'));
            $object->setPresentation($entity["presentation"]);
            $object->setActive($entity["active"]);
            
            $object->setHosts(array("Alexander Engativa", "Camilo Diaz", "Fernando Valenzuela", "Edwin Gutierrez"));
            
            $manager->persist($object);
            $this->addReference('data_invitation_'.$entity['livingRoom'], $object);
        }
        $manager->flush();
    }

}

?>