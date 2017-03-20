<?php

namespace AtolHubBundle\Controller;

use AtolHubBundle\Entity\AtolHubGroup;
use AtolHubBundle\Form\Type\AtolHubGroupType;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AtolHubGroupController extends Controller
{
    /**
     * @Route("/group/", name="atol_hub.hub_group_index")
     * @Template
     * @Acl(
     *     id="atol_hub.hub_group_view",
     *     type="entity",
     *     class="AtolHubBundle:AtolHub",
     *     permission="VIEW"
     * )
     */
    public function indexAction()
    {
        return ['gridName' => 'atol-hub-group-grid'];
    }

    /**
     * @Route("/group/{id}", name="atol_hub.hub_group_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("atol_hub.hub_group_view")
     *
     * @param AtolHubGroup $atolHubGroup
     *
     * @return array
     */
    public function viewAction(AtolHubGroup $atolHubGroup)
    {
        return ['entity' => $atolHubGroup];
    }

    /**
     * @Route("/group/create", name="atol_hub.hub_group_create")
     * @Template("AtolHubBundle:AtolHubGroup:update.html.twig")
     *
     * @param Request $request
     *
     * @return array
     */
    public function createAction(Request $request)
    {
        return $this->update(new AtolHubGroup(), $request);
    }

    /**
     * @Route("/group/update/{id}", name="atol_hub.hub_group_update", requirements={"id":"\d+"}, defaults={"id":0})
     * @Template("AtolHubBundle:AtolHubGroup:update.html.twig")
     *
     * @param AtolHubGroup $atolHubGroup
     * @param Request $request
     *
     * @return array
     */
    public function editAction(AtolHubGroup $atolHubGroup, Request $request)
    {
        return $this->update($atolHubGroup, $request);
    }

    /**
     * @param AtolHubGroup $atolHubGroup
     * @param Request $request
     *
     * @return mixed
     */
    private function update(AtolHubGroup $atolHubGroup, Request $request)
    {
        $form = $this->createForm(new AtolHubGroupType(), $atolHubGroup);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('atol_hub.hub_group_index');
        }

        return [
            'entity' => $atolHubGroup,
            'form' => $form->createView(),
        ];
    }
}
