<?php

namespace AtolHubBundle\Entity\Repository;

use AtolHubBundle\Entity\AtolHub;
use Doctrine\ORM\EntityRepository;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AtolHubEventRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        return $this->findBy([], ['id' => 'desc']);
    }

    /**
     * @param AtolHub $hub
     * @return array
     */
    public function getLastByHub(AtolHub $hub)
    {
        return $this->findBy(['hub' => $hub], ['id' => 'desc'], 50);
    }
}
