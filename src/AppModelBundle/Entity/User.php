<?php

namespace AppModelBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser {

//************************* Modificacion ***************************************

    public function __construct() {
        parent::__construct();
        $this->setRoles(array('ROLE_PERIODISTA'));
    }
    
//*********************** Fin modificacion *************************************
    
    /**
     * @var string
     */
    private $picture;

    /**
     * @var integer
     */
    private $age;


    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }
}
