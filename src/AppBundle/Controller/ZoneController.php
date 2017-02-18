<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ZoneController extends Controller
{
    /**
     * @Route("/zones/", name="get_zones")
     * @Method({"GET"})
     */
    public function getZonesAction()
    {
        $zones = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->findAll();
        
        foreach ($zones as $key => $value) {
            
            $zone=$value;
            $attributZones[]=$this->get("historique_service")->findLastHistorique($zone);
        }
        return $this->render('AppBundle:Zone:get_zones.html.twig', array(
            "lastHistoriquezones"=>$attributZones
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
     * @Route("/zones", name="post_zone")
     * @Method({"POST"})
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
