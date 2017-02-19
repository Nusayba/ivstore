<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\ActivePeriodeZone;
use AppBundle\Entity\Zone;
use AppBundle\Form\ActivePeriodeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ActivePeriodeController extends Controller
{
    /**
     * @Route("/zones/{id}/activePeriodes", name="get_active_periodes")
     * @Method({"GET"})
     */
    public function getActivePeriodesAction(Request $request)
    {
        $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id')); 

        return $this->render('AppBundle:ActivePeriode:get_active_periodes.html.twig', array("activePeriodes"=>$zone->getActivePeriodes()));
    }

    /**
     * @Route("/zones/{id}/activePeriodes/{id2}", name="post_active_periodes")
     * @Method({"POST"})
     */
    public function postActivePeriodeAction(Request $request)
    {
        $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->findOneById($request->get('id'));

        $activePeriode = new \AppBundle\Entity\ActivePeriodeZone();
        $activePeriode->setZone($zone); 
        $form = $this->createForm(ActivePeriodeType::class, $activePeriode);

        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->get('doctrine.orm.entity_manager');
                $em->persist($activePeriode);
                $em->flush();
                return $this->render('AppBundle:ActivePeriode:post_active_periode.html.twig', array(
                    "form"=>$form->createView(), "message"=>"Periode active ajoutée"
                ));
            } else {
                return $this->render('AppBundle:ActivePeriode:post_active_periode.html.twig', array(
                    "form"=>$form->createView()
                ));
            }
        
        
    }

    /**
     * @Route("/removeActivePeriode")
     */
    public function removeActivePeriodeAction()
    {
        return $this->render('AppBundle:ActivePeriode:remove_active_periode.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/pushActivePeriode")
     */
    public function patchActivePeriodeAction()
    {
        return $this->render('AppBundle:ActivePeriode:patch_active_periode.html.twig', array(
            // ...
        ));
    }

}
