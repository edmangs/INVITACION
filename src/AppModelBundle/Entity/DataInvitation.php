<?php

namespace AppModelBundle\Entity;

/**
 * DataInvitation
 */
class DataInvitation
{
    //--------------------------------- Modify ---------------------------------
    public function __toString() {
        return $this->getPresentation() ? (string)$this->getPresentation() : "";
    }
    //-------------------------------- End Modify ------------------------------
    
    /**
     * @var string
     */
    private $livingRoom;

    /**
     * @var \DateTime
     */
    private $dataInvitation;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var array
     */
    private $hosts;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set livingRoom
     *
     * @param string $livingRoom
     *
     * @return DataInvitation
     */
    public function setLivingRoom($livingRoom)
    {
        $this->livingRoom = $livingRoom;

        return $this;
    }

    /**
     * Get livingRoom
     *
     * @return string
     */
    public function getLivingRoom()
    {
        return $this->livingRoom;
    }

    /**
     * Set dataInvitation
     *
     * @param \DateTime $dataInvitation
     *
     * @return DataInvitation
     */
    public function setDataInvitation($dataInvitation)
    {
        $this->dataInvitation = $dataInvitation;

        return $this;
    }

    /**
     * Get dataInvitation
     *
     * @return \DateTime
     */
    public function getDataInvitation()
    {
        return $this->dataInvitation;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return DataInvitation
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set hosts
     *
     * @param array $hosts
     *
     * @return DataInvitation
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;

        return $this;
    }

    /**
     * Get hosts
     *
     * @return array
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return DataInvitation
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return DataInvitation
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var boolean
     */
    private $active;


    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return DataInvitation
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}
