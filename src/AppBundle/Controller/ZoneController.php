<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ZoneController extends Controller
{
    /**
     * @Route("/getZones")
     */
    public function getZonesAction()
    {
        return $this->render('AppBundle:Zone:get_zones.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/getZone")
     */
    public function getZoneAction()
    {
        return $this->render('AppBundle:Zone:get_zone.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/postZone")
     */
    public function postZoneAction()
    {
        return $this->render('AppBundle:Zone:post_zone.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/patchZone")
     */
    public function patchZoneAction()
    {
        return $this->render('AppBundle:Zone:patch_zone.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeZone")
     */
    public function removeZoneAction()
    {
        return $this->render('AppBundle:Zone:remove_zone.html.twig', array(
            // ...
        ));
    }

}
