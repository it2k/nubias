<?php

namespace AtolHubBundle\Controller\Api\Rest;

use Oro\Bundle\SoapBundle\Controller\Api\Rest\RestController;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 * @RouteResource("atolhubgroup")
 * @NamePrefix("atol_hub_group_api_")
 */
class AtolHubGroupController extends RestController
{
    /**
     * @param int $id
     *
     * @return Response
     */
    public function deleteAction($id)
    {
        return $this->handleDeleteRequest($id);
    }

    /**
     * @return object
     */
    public function getManager()
    {
        return $this->get('atol_hub.group_manager.api');
    }

    /**
     * @return null
     */
    public function getFormHandler()
    {
        return null;
    }
}
