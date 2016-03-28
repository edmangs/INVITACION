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
            array("name" => "Gutierrez Cervera", "lastname" => "Edwin Eduardo", "email" => "edwine.gutierrezc@utadeo.edu.co"),
            array("name" => "Diaz Jaimes", "lastname" => "Camilo", "email" => "camilo.diazj@utadeo.edu.co"),
            array("name" => "Valenzuela Torres", "lastname" => "Faiber Fernando", "email" => "faiberf.valenzuelat@utadeo.edu.co"),
            array("name" => "Engativa Montana", "lastname" => "Geovanni Alexander", "email" => "geovannia.engativam@utadeo.edu.co"),
            
            array("name" => "Rodriguez Cristancho", "lastname" => "Julian Arturo", "email" => "julian.rodriguezc@utadeo.edu.co"),
            array("name" => "Herrera Cabrera", "lastname" => "Ivan Luciano", "email" => "ivanl.herrerac@utadeo.edu.co"),
            array("name" => "Garrido Rincon", "lastname" => "Samuel", "email" => "samuel.garridor@utadeo.edu.co"),
            array("name" => "Diaz Muñoz", "lastname" => "Enderson Gonzalo", "email" => "endersong.diazm@utadeo.edu.co"),
            array("name" => "Betancourth Cuellar", "lastname" => "Diony Gineth", "email" => "dionyg.betancourthc@utadeo.edu.co"),
            array("name" => "Vizcaino Castillo", "lastname" => "Andrea Carolina", "email" => "andreac.vizcainoc@utadeo.edu.co"),
            array("name" => "Herrera Paz", "lastname" => "Andres", "email" => "andres.herrerapaz@utadeo.edu.co"),
            array("name" => "Quintero Lozano", "lastname" => "Andres", "email" => "andres.quinterol@utadeo.edu.co"),
            array("name" => "Gutierrez Perez", "lastname" => "Didier Gerardo", "email" => "didierg.gutierrezp@utadeo.edu.co"),
            array("name" => "Velandia Garzon", "lastname" => "Gelver Emilio", "email" => "gelvere.velandiag@utadeo.edu.co"),
            array("name" => "Lugo Rivera", "lastname" => "Johan", "email" => "johan.lugor@utadeo.edu.co"),
            array("name" => "Riano Vanegas", "lastname" => "Sebastian", "email" => "sebastian.rianov@utadeo.edu.co"),
            array("name" => "Soacha Patalagua", "lastname" => "Paula Andrea", "email" => "paulaa.soachap@utadeo.edu.co"),
            array("name" => "Bareno Arrieta", "lastname" => "Nilianys Karolina", "email" => "nilianysk.barenoa@utadeo.edu.co"),
            array("name" => "Garcia Sanchez", "lastname" => "Hernan", "email" => "hernan.garcias@utadeo.edu.co"),
            array("name" => "Patino Pava", "lastname" => "Karoline Natalia", "email" => "karolinen.patinop@utadeo.edu.co"),
            array("name" => "Fajardo Ordonez", "lastname" => "Laura Daniela", "email" => "laurad.fajardoo@utadeo.edu.co"),
            array("name" => "Parodi Mancera", "lastname" => "Santiago Alberto", "email" => "santiagoa.parodim@utadeo.edu.co"),
            array("name" => "Merchan Lemus", "lastname" => "Yeisson Andres", "email" => "yeissona.merchanl@utadeo.edu.co"),
            array("name" => "Castañeda Pinzon", "lastname" => "Victor Danilo", "email" => "victord.castanedap@utadeo.edu.co"),
            array("name" => "Moreno Carrillo", "lastname" => "Jairo Duban", "email" => "jairod.morenoc@utadeo.edu.co"),
            array("name" => "Isoza Cifuentes", "lastname" => "Nicoll Daniela", "email" => "nicolld.isozac@utadeo.edu.co"),
            array("name" => "Amado Duran", "lastname" => "Nicolas", "email" => "nicolas.amadod@utadeo.edu.co"),
            array("name" => "Salazar Suarez", "lastname" => "Daniela", "email" => "daniela.salazars@utadeo.edu.co"),
            array("name" => "Gil Sarmiento", "lastname" => "Arturo", "email" => "arturo.gil@utadeo.edu.co"),
            array("name" => "Valdes Gomez", "lastname" => "Jose Adrian", "email" => "josea.valdesg@utadeo.edu.co"),
            array("name" => "Gamero Saltarin", "lastname" => "Wilman Jesus", "email" => "wilmanj.gameros@utadeo.edu.co"),
            array("name" => "Vargas Boyaca", "lastname" => "Juan Sebastian", "email" => "juans.vargasb@utadeo.edu.co")
        );

        foreach ($entities as $entity) {
            $object = new Invitation();

            $object->setName($entity["name"]);
            $object->setLastname($entity["lastname"]);
            $object->setEmail($entity["email"]);

            $manager->persist($object);
            $this->addReference('user_invitation_' . $entity['name'], $object);
        }
        $manager->flush();
    }

}

?>