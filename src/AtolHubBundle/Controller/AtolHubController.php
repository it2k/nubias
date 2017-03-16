<?php

namespace AtolHubBundle\Controller;

use AtolHubBundle\Entity\AtolHub;
use AtolHubBundle\Form\Type\AtolHubType;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AtolHubController extends Controller
{
    /**
     * @Route("/", name="atol_hub.hub_index")
     * @Template
     * @Acl(
     *     id="atol_hub.hub_view",
     *     type="entity",
     *     class="AtolHubBundle:AtolHub",
     *     permission="VIEW"
     * )
     */
    public function indexAction()
    {
        return ['gridName' => 'atol-hub-grid'];
    }

    /**
     * @Route("/{id}", name="atol_hub.hub_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("atol_hub.hub_view")
     *
     * @param AtolHub $atolHub
     *
     * @return array
     */
    public function viewAction(AtolHub $atolHub)
    {
        return ['entity' => $atolHub];
    }

    /**
     * @Route("/create", name="atol_hub.hub_create")
     * @Template("AtolHubBundle:AtolHub:update.html.twig")
     *
     * @param Request $request
     *
     * @return array
     */
    public function createAction(Request $request)
    {
        return $this->update(new AtolHub(), $request);
    }

    /**
     * @Route("/update", name="atol_hub.hub_update")
     * @Template("AtolHubBundle:AtolHub:update.html.twig")
     *
     * @param AtolHub $atolHub
     * @param Request $request
     *
     * @return array
     */
    public function editAction(AtolHub $atolHub, Request $request)
    {
        return $this->update($atolHub, $request);
    }

    /**
     * @param AtolHub $atolHub
     * @param Request $request
     *
     * @return mixed
     */
    private function update(AtolHub $atolHub, Request $request)
    {
        $form = $this->createForm(new AtolHubType(), $atolHub);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('atol_hub.hub_index');
        }

        return [
            'entity' => $atolHub,
            'form' => $form->createView(),
        ];
    }
}
