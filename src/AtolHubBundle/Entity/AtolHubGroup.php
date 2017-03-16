<?php

namespace AtolHubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 *
 * @ORM\Table(name="atol_hub_group")
 * @ORM\Entity(repositoryClass="AtolHubBundle\Entity\Repository\AtolHubGroupRepository")
 */
class AtolHubGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var AtolHub
     *
     * @ORM\ManyToMany(targetEntity="AtolHubBundle\Entity\AtolHub", mappedBy="groups")
     */
    private $hubs;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hubs = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param AtolHub $hubs
     *
     * @return $this
     */
    public function addHub(AtolHub $hubs)
    {
        $this->hubs[] = $hubs;

        return $this;
    }

    /**
     * @param AtolHub $hubs
     */
    public function removeHub(AtolHub $hubs)
    {
        $this->hubs->removeElement($hubs);
    }

    /**
     * @return Collection
     */
    public function getHubs()
    {
        return $this->hubs;
    }
}
