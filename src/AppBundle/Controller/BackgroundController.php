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
    public function getBackgroundsAction(Request $request)
    {
        //création du formulaire de recherche
        
        $dto = new \AppBundle\DTO\BackgroundDTO();
        
        $form=$this->createForm(\AppBundle\Form\RechercheBackgroundType::class, $dto);
        $form->handleRequest($request);
        
        //création du formulaire de modification
        
        $dto2 = new \AppBundle\DTO\ModifBackgroundDTO();
        
        $form2=$this->createForm(\AppBundle\Form\ModifBackgroundType::class, $dto2);
        $form2->submit($request->request->all());
        //$form2->handleRequest($request);
        
        //création du formulaire de suppression
        
        $dto3 = new \AppBundle\DTO\ModifBackgroundDTO();
        
        $form3=$this->createForm(\AppBundle\Form\RemoveBackgroundType::class, $dto3);
        $form3->handleRequest($request);
        
        //Si formulaire recherche submit
        
        if( $form->isSubmitted() && $form->isValid() ){
            
            $heureDate=$dto->getHeureDate();
            $backgrounds = $this->get("background_service")->rechercheBackground($heureDate);
            
            if (empty($backgrounds)) {
            return $this->render('AppBundle:Background:get_backgrounds.html.twig', array(
            "form"=>$form->createView(),'message'=>'Background not found'
            ));
            }
            //ici
            return $this->render('AppBundle:Background:get_backgrounds.html.twig', array(
            "form"=>$form->createView(),'backgrounds'=>$backgrounds
            ));
            
        }
        
        //Si formulaire modification submit
        
        if( $form2->isSubmitted() && $form2->isValid() ){
            
            $id=$dto->getId();
            return $this->forward("patch_background", array('id'=>$id));
            
        }
        
        //Sinon on affiche tous les backgrounds en base
        $backgrounds = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Background')
                ->findAll();
        $dto2 = new \AppBundle\DTO\ModifBackgroundDTO();
        foreach ($backgrounds as $key => $value) {
        
        $id=$value->getId();
        $tabForm[$key]=$this->createForm(\AppBundle\Form\ModifBackgroundType::class, $dto2, array('action'=>$id))
                            ->submit($request->request->all())
                            ->createView();
        
        }
        //ici
        return $this->render('AppBundle:Background:get_backgrounds.html.twig', 
                array('backgrounds'=>$backgrounds,"form"=>$form->createView(),
                    "form2"=>$form2->createView(), "form3"=>$form3->createView(),
                    "tabForm"=>$tabForm
        ));
    }

    /**
     * @Route("/backgrounds/{id}", name="get_background")
     * @Method({"GET"})
     */
    public function getBackgroundAction(Request $request)
    {
        
        $background = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Background')
                ->find($request->get('id')); 
        
        return $this->render('AppBundle:Background:get_background.html.twig', 
                array('background'=>$background
        ));
    }

    /**
     * @Route("/backgrounds", name="post_background")
     * @Method({"POST"})
     */
    public function postBackgroundAction(Request $request)
    {
        $background = new Background();
        $form = $this->createForm(\AppBundle\Form\BackgroundType::class, $background);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($background);
            $em->flush();
            
            return $this->render('AppBundle:Background:post_background.html.twig', array(
                'form'=>$form->createView(), 'message'=>"background ajouté"
            ));
            
        } else {
            
            return $this->render('AppBundle:Background:post_background.html.twig', array(
                'form'=>$form->createView()
            ));
        }
        
    }

    /**
     * @Route("/backgrounds/{id}", name="patch_backgrounds")
     * @Method("PATCH")
     */
    public function patchBackgroundsAction(Request $request)
    {
        $background = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Background')
                ->find($request->get('id')); 
        
        $form = $this->createForm(\AppBundle\Form\BackgroundType::class,$background);
        
        if ($request->isMethod('POST')) {
            
            $form->submit($request->request->get($form->getName()), false);
           
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->get('doctrine.orm.entity_manager');
                $em->persist($background);
                $em->flush();
                
                return $this->render('AppBundle:Background:patch_background.html.twig', array(
                    "form"=>$form->createView(), "message"=>"Background modifié"
                ));
            }
        }
        
        return $this->render('AppBundle:Background:patch_background.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    /**
     * @Route("/backgrounds/{id}", name="delete_background")
     * @Method({"DELETE"})
     */
    public function removeBackgroundAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $background = $em->getRepository('AppBundle:Background')
                    ->find($request->get('id'));
        
        if ($background) {
            $em->remove($background);
            $em->flush();
        }
        return $this->redirectToRoute('get_backgrounds',array('message'=>'Background supprimer'));
        
    }

}
