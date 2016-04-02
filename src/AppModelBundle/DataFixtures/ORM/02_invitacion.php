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
            array("lastname" => "Gutierrez Cervera", "name" => "Edwin Eduardo", "email" => "edwine.gutierrezc@utadeo.edu.co"),
            array("lastname" => "Diaz Jaimes", "name" => "Camilo", "email" => "camilo.diazj@utadeo.edu.co"),
            array("lastname" => "Valenzuela Torres", "name" => "Faiber Fernando", "email" => "faiberf.valenzuelat@utadeo.edu.co"),
            array("lastname" => "Engativa Montana", "name" => "Geovanni Alexander", "email" => "geovannia.engativam@utadeo.edu.co"),
            
            array("lastname" => "Rodriguez Cristancho", "name" => "Julian Arturo", "email" => "julian.rodriguezc@utadeo.edu.co"),
            array("lastname" => "Herrera Cabrera", "name" => "Ivan Luciano", "email" => "ivanl.herrerac@utadeo.edu.co"),
            array("lastname" => "Garrido Rincon", "name" => "Samuel", "email" => "samuel.garridor@utadeo.edu.co"),
            array("lastname" => "Diaz Muñoz", "name" => "Enderson Gonzalo", "email" => "endersong.diazm@utadeo.edu.co"),
            array("lastname" => "Betancourth Cuellar", "name" => "Diony Gineth", "email" => "dionyg.betancourthc@utadeo.edu.co"),
            array("lastname" => "Vizcaino Castillo", "name" => "Andrea Carolina", "email" => "andreac.vizcainoc@utadeo.edu.co"),
            array("lastname" => "Herrera Paz", "name" => "Andres", "email" => "andres.herrerapaz@utadeo.edu.co"),
            array("lastname" => "Quintero Lozano", "name" => "Andres", "email" => "andres.quinterol@utadeo.edu.co"),
            array("lastname" => "Gutierrez Perez", "name" => "Didier Gerardo", "email" => "didierg.gutierrezp@utadeo.edu.co"),
            array("lastname" => "Velandia Garzon", "name" => "Gelver Emilio", "email" => "gelvere.velandiag@utadeo.edu.co"),
            array("lastname" => "Lugo Rivera", "name" => "Johan", "email" => "johan.lugor@utadeo.edu.co"),
            array("lastname" => "Riano Vanegas", "name" => "Sebastian", "email" => "sebastian.rianov@utadeo.edu.co"),
            array("lastname" => "Soacha Patalagua", "name" => "Paula Andrea", "email" => "paulaa.soachap@utadeo.edu.co"),
            array("lastname" => "Bareno Arrieta", "name" => "Nilianys Karolina", "email" => "nilianysk.barenoa@utadeo.edu.co"),
            array("lastname" => "Garcia Sanchez", "name" => "Hernan", "email" => "hernan.garcias@utadeo.edu.co"),
            array("lastname" => "Patino Pava", "name" => "Karoline Natalia", "email" => "karolinen.patinop@utadeo.edu.co"),
            array("lastname" => "Fajardo Ordonez", "name" => "Laura Daniela", "email" => "laurad.fajardoo@utadeo.edu.co"),
            array("lastname" => "Parodi Mancera", "name" => "Santiago Alberto", "email" => "santiagoa.parodim@utadeo.edu.co"),
            array("lastname" => "Merchan Lemus", "name" => "Yeisson Andres", "email" => "yeissona.merchanl@utadeo.edu.co"),
            array("lastname" => "Castañeda Pinzon", "name" => "Victor Danilo", "email" => "victord.castanedap@utadeo.edu.co"),
            array("lastname" => "Moreno Carrillo", "name" => "Jairo Duban", "email" => "jairod.morenoc@utadeo.edu.co"),
            array("lastname" => "Isoza Cifuentes", "name" => "Nicoll Daniela", "email" => "nicolld.isozac@utadeo.edu.co"),
            array("lastname" => "Amado Duran", "name" => "Nicolas", "email" => "nicolas.amadod@utadeo.edu.co"),
            array("lastname" => "Salazar Suarez", "name" => "Daniela", "email" => "daniela.salazars@utadeo.edu.co"),
            array("lastname" => "Gil Sarmiento", "name" => "Arturo", "email" => "arturo.gil@utadeo.edu.co"),
            array("lastname" => "Valdes Gomez", "name" => "Jose Adrian", "email" => "josea.valdesg@utadeo.edu.co"),
            array("lastname" => "Gamero Saltarin", "name" => "Wilman Jesus", "email" => "wilmanj.gameros@utadeo.edu.co"),
            array("lastname" => "Vargas Boyaca", "name" => "Juan Sebastian", "email" => "juans.vargasb@utadeo.edu.co")
        );

        foreach ($entities as $entity) {
            $object = new Invitation();

            $object->setName($entity["name"]);
            $object->setLastname($entity["lastname"]);
            $object->setEmail($entity["email"]);

            $manager->persist($object);
            $this->addReference('user_invitation_' . $entity['lastname'], $object);
        }
        $manager->flush();
    }

}

?>