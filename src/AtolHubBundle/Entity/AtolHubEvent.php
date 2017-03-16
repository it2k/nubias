<?php

namespace AtolHubBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\UserBundle\Entity\User;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 *
 * @ORM\Table(name="atol_hub_event")
 * @ORM\Entity(repositoryClass="AtolHubBundle\Entity\Repository\AtolHubEventRepository")
 */
class AtolHubEvent
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
     * @var AtolHub
     *
     * @ORM\ManyToOne(targetEntity="AtolHubBundle\Entity\AtolHub", inversedBy="events")
     */
    private $hub;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", nullable=true)
     */
    private $state;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param DateTime $time
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param AtolHub $hub
     *
     * @return $this
     */
    public function setHub(AtolHub $hub = null)
    {
        $this->hub = $hub;

        return $this;
    }

    /**
     * @return AtolHub
     */
    public function getHub()
    {
        return $this->hub;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}
