<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ActivePeriodeController extends Controller
{
    /**
     * @Route("/getActivePeriodes")
     */
    public function getActivePeriodesAction()
    {
        return $this->render('AppBundle:ActivePeriode:get_active_periodes.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/postActivePeriode")
     */
    public function postActivePeriodeAction()
    {
        return $this->render('AppBundle:ActivePeriode:post_active_periode.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/getActivePeriode")
     */
    public function getActivePeriodeAction()
    {
        return $this->render('AppBundle:ActivePeriode:get_active_periode.html.twig', array(
            // ...
        ));
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
