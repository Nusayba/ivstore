<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Background;

class BackgroundController extends Controller
{
    /**
     * @Route("/backgrounds/", name="get_backgrounds")
     * @Method({"GET"})
     */
    public function getBackgroundsAction()
    {
        $backgrounds = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Background')
                ->findAll();

        // Gestion de la réponse
        return $this->render('AppBundle:Background:get_backgrounds.html.twig', 
                array('backgrounds'=>$backgrounds
        ));
    }

    /**
     * @Route("/backgrounds/{id}", name="get_background")
     * @Method({"GET"})
     */
    public function getBackgroundAction(Request $request)
    {
        $dto = new \AppBundle\DTO\BackgroundDTO();
        
        $form=$this->createForm(\AppBundle\Form\RechercheBackgroundType::class, $dto);
        $form->handleRequest($request);
        
        if( $form->isSubmitted() && $form->isValid() ){
            $heureDate=$dto->getHeureDate();
            //$background= new Background;
            $background = $this->get("background_service")->rechercheBackground($heureDate);
            
            return $this->render('AppBundle:Background:get_background.html.twig', array(
            "form"=>$form->createView(),'background'=>$background[0]
            ));
            
        }
        
                
       
        //if (empty($background)) {
         //   return \FOS\RestBundle\View\View::create(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
       // }

        return $this->render('AppBundle:Background:get_background.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    /**
     * @Route("/postBackground")
     */
    public function postBackgroundAction()
    {
        return $this->render('AppBundle:Background:post_background.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/patchBackground")
     */
    public function patchBackgroundAction()
    {
        return $this->render('AppBundle:Background:patch_background.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeBackground")
     */
    public function removeBackgroundAction()
    {
        return $this->render('AppBundle:Background:remove_background.html.twig', array(
            // ...
        ));
    }

}
