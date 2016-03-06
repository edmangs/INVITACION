<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesUsers extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 1;
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
        
        
        $users = array(
            array(
                'username' => 'admin',
                'username_canonical' => 'admin',
                'email' => 'admin@correo.com',
                'email_canonical' => 'admin@correo.com',
                'enabled' => true,
                'salt' => md5(uniqid()),
                'password' => 'admin2016*',
                'locked' => false,
                'expired' => false,
                'roles' => array('ROLE_SUPER_ADMIN'),
                'credentials_expired' => false
            )
        );
        
        
        
        
        foreach ($users as $user) {
            $new_user = new User();
            $new_user->setUsername($user['username']);
            $new_user->setUsernameCanonical($user['username_canonical']);
            $new_user->setEmail($user['email']);
            $new_user->setEmailCanonical($user['email_canonical']);
            $new_user->setEnabled($user['enabled']);
            $encoder = $this->container
                    ->get('security.encoder_factory')
                    ->getEncoder($new_user)
            ;
            $new_user->setPassword($encoder->encodePassword($user['password'], $new_user->getSalt()));
            $new_user->setLocked($user['locked']);
            $new_user->setExpired($user['expired']);
            $new_user->setRoles($user['roles']);
            $new_user->setCredentialsExpired($user['credentials_expired']);
            $manager->persist($new_user);
            $this->addReference('user_'.$user['username'], $new_user);
        }
        $manager->flush();
    }

}

?>