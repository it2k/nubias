<?php

namespace AtolHubBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 *
 * @ORM\Table(name="atol_hub")
 * @ORM\Entity(repositoryClass="AtolHubBundle\Entity\Repository\AtolHubRepository")
 */
class AtolHub
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
     * @var string
     *
     * @ORM\Column(name="ip", type="string")
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     */
    private $password;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="update_system_info_time", type="datetime", nullable=true)
     */
    private $updateSystemInfoTime;

    /**
     * @var string
     *
     * @ORM\Column(name="factory_number", type="string", length=100, nullable=true)
     */
    private $factoryNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="last_update_time", type="string", length=35, nullable=true)
     */
    private $lastUpdateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="last_check_update_time", type="string", length=35, nullable=true)
     */
    private $lastCheckUpdateTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="need_update", type="boolean", nullable=true)
     */
    private $needUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="utm_version", type="string", nullable=true)
     */
    private $utmVersion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="old_version", type="boolean", nullable=true)
     */
    private $oldVersion;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var bool
     *
     * @ORM\Column(name="utm_delete_documents", type="boolean", nullable=true)
     */
    private $utmDeleteDocuments;

    /**
     * @var bool
     *
     * @ORM\Column(name="errors_in_log", type="boolean",  nullable=true)
     */
    private $errorsInLog;

    /**
     * @var AtolHub
     *
     * @ORM\ManyToMany(targetEntity="AtolHubBundle\Entity\AtolHubGroup", inversedBy="hubs")
     * @ORM\JoinTable(name="atol_hubs_groups")
     */
    private $groups;

    /**
     * @var AtolHubEvent
     *
     * @ORM\OneToMany(targetEntity="AtolHubBundle\Entity\AtolHubEvent", mappedBy="hub")
     */
    private $events;

    /**
     * @var bool
     *
     * @ORM\Column(name="alive", type="boolean", nullable=true)
     */
    private $alive;

    /**
     * @var int
     *
     * @ORM\Column(name="rsa_cert_expire_day_count", type="integer", nullable=true)
     */
    private $rsaCertExpireDayCount;

    /**
     * @var int
     *
     * @ORM\Column(name="gost_cert_expire_day_count", type="integer", nullable=true)
     */
    private $gostCertExpireDayCount;

    /**
     * @var bool
     *
     * @ORM\Column(name="cert_expired", type="boolean", nullable=true)
     */
    private $certExpired;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Construct
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    /**
     * @return int
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
     * @param string $ip
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param boolean $active
     *
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param AtolHubGroup $groups
     *
     * @return $this
     */
    public function addGroup(AtolHubGroup $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * @param AtolHubGroup $groups
     *
     * @return $this
     */
    public function removeGroup(AtolHubGroup $groups)
    {
        $this->groups->removeElement($groups);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return string
     */
    public function getFactoryNumber()
    {
        return $this->factoryNumber;
    }

    /**
     * @param string $factoryNumber
     *
     * @return $this
     */
    public function setFactoryNumber($factoryNumber)
    {
        $this->factoryNumber = $factoryNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdateTime()
    {
        return $this->lastUpdateTime;
    }

    /**
     * @param string $lastUpdateTime
     *
     * @return $this
     */
    public function setLastUpdateTime($lastUpdateTime)
    {
        $this->lastUpdateTime = $lastUpdateTime;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNeedUpdate()
    {
        return $this->needUpdate;
    }

    /**
     * @param boolean $needUpdate
     *
     * @return $this
     */
    public function setNeedUpdate($needUpdate)
    {
        $this->needUpdate = $needUpdate;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastCheckUpdateTime()
    {
        return $this->lastCheckUpdateTime;
    }

    /**
     * @param string $lastCheckUpdateTime
     *
     * @return $this
     */
    public function setLastCheckUpdateTime($lastCheckUpdateTime)
    {
        $this->lastCheckUpdateTime = $lastCheckUpdateTime;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUtmDeleteDocuments()
    {
        return $this->utmDeleteDocuments;
    }

    /**
     * @param bool $utmDeleteDocuments
     *
     * @return $this
     */
    public function setUtmDeleteDocuments($utmDeleteDocuments)
    {
        $this->utmDeleteDocuments = $utmDeleteDocuments;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->alive;
    }

    /**
     * @param bool $alive
     *
     * @return $this
     */
    public function setAlive($alive)
    {
        $this->alive = $alive;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getNeedUpdate()
    {
        return $this->needUpdate;
    }

    /**
     * @param AtolHubEvent $events
     *
     * @return $this
     */
    public function addEvent(AtolHubEvent $events)
    {
        $this->events[] = $events;

        return $this;
    }

    /**
     * @param AtolHubEvent $events
     *
     * @return $this
     */
    public function removeEvent(AtolHubEvent $events)
    {
        $this->events->removeElement($events);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return boolean
     */
    public function isErrorsInLog()
    {
        return $this->errorsInLog;
    }

    /**
     * @param boolean $errorsInLog
     *
     * @return $this
     */
    public function setErrorsInLog($errorsInLog)
    {
        $this->errorsInLog = $errorsInLog;

        return $this;
    }

    /**
     * @return string
     */
    public function getUtmVersion()
    {
        return $this->utmVersion;
    }

    /**
     * @param string $utmVersion
     *
     * @return $this
     */
    public function setUtmVersion($utmVersion)
    {
        $this->utmVersion = $utmVersion;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isOldVersion()
    {
        return $this->oldVersion;
    }

    /**
     * @param boolean $oldVersion
     *
     * @return $this
     */
    public function setOldVersion($oldVersion)
    {
        $this->oldVersion = $oldVersion;

        return $this;
    }

    /**
     * @return int
     */
    public function getRsaCertExpireDayCount()
    {
        return $this->rsaCertExpireDayCount;
    }

    /**
     * @param int $rsaCertExpireDayCount
     *
     * @return $this
     */
    public function setRsaCertExpireDayCount($rsaCertExpireDayCount)
    {
        $this->rsaCertExpireDayCount = $rsaCertExpireDayCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getGostCertExpireDayCount()
    {
        return $this->gostCertExpireDayCount;
    }

    /**
     * @param int $gostCertExpireDayCount
     *
     * @return $this
     */
    public function setGostCertExpireDayCount($gostCertExpireDayCount)
    {
        $this->gostCertExpireDayCount = $gostCertExpireDayCount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCertExpired()
    {
        return $this->certExpired;
    }

    /**
     * @param bool $certExpired
     *
     * @return $this
     */
    public function setCertExpired($certExpired)
    {
        $this->certExpired = $certExpired;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdateSystemInfoTime()
    {
        return $this->updateSystemInfoTime;
    }

    /**
     * @param DateTime $updateSystemInfoTime
     *
     * @return $this
     */
    public function setUpdateSystemInfoTime($updateSystemInfoTime)
    {
        $this->updateSystemInfoTime = $updateSystemInfoTime;

        return $this;
    }

    /**
     * Get oldVersion
     *
     * @return boolean
     */
    public function getOldVersion()
    {
        return $this->oldVersion;
    }

    /**
     * Get errorsInLog
     *
     * @return boolean
     */
    public function getErrorsInLog()
    {
        return $this->errorsInLog;
    }

    /**
     * Get alive
     *
     * @return boolean
     */
    public function getAlive()
    {
        return $this->alive;
    }

    /**
     * Get certExpired
     *
     * @return boolean
     */
    public function getCertExpired()
    {
        return $this->certExpired;
    }
}
