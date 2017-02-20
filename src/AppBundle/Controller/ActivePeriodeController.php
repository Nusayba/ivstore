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
     * @Route("/zones/{id}/activePeriodes", name="get_active_periode")
     * @Method({"GET"})
     */
    public function getActivePeriodesAction(Request $request)
    {
        $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id'));
        
        $activePeriodes=$zone->getActivePeriodes();
        $dto2 = new \AppBundle\DTO\RemovePointDTO();
        foreach ($activePeriodes as $key => $value) {
            $id2=$value->getId();
            // création du tableau de formulaire de suppression de periode
                $tabForm[$key]=$this->createForm(\AppBundle\Form\RemoveActivePeriodeType::class, $dto2, array('action'=>'activePeriodes/'.$id2))
                                    ->submit($request->request->all())
                                    ->createView();
            // création du tableau de formulaire de modification de periode  
            $tabForm2[$key]=$this->createForm(\AppBundle\Form\ModifBackgroundType::class, $dto2, array('action'=>'activePeriodes/'.$id2))
                                    ->submit($request->request->all())
                                    ->createView();
        }
        if(isset($tabForm)){
            return $this->render('AppBundle:ActivePeriode:get_active_periodes.html.twig', array("activePeriodes"=>$activePeriodes, 
                            'tabForm'=>$tabForm, 'tabForm2'=>$tabForm2));
        }

        
        
        return $this->render('AppBundle:ActivePeriode:get_active_periodes.html.twig', array("message"=>"Pas de périodes d'activités trouvées", 
                            ));
    }

    /**
     * @Route("/zones/{id}/activePeriodes", name="post_active_periodes")
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
     * @Route("/zones/{id}/activePeriodes/{id2}", name="delete_active_periode")
     * @Method({"DELETE"})
     */
    public function removeActivePeriodeAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $activePeriode = $em->getRepository('AppBundle:ActivePeriodeZone')
                    ->find($request->get('id2'));
        
        $id=$request->get('id');
        
        if ($activePeriode) {
            $em->remove($activePeriode);
            $em->flush();
        }
        return $this->redirectToRoute('get_zones');
    }

    /**
     * @Route("/zones/{id}/activePeriodes/{id2}", name="patch_active_periode")
     * @Method("PATCH")
     */
    public function patchActivePeriodeAction(Request $request)
    {
        $activePeriode = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:ActivePeriodeZone')
                ->find($request->get('id2')); 
        
        $form = $this->createForm(\AppBundle\Form\PatchActivePeriodeType::class,$activePeriode);
        
        if ($request->isMethod('PATCH')) {
            
            $form->submit($request->request->get($form->getName()), false);
           
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->get('doctrine.orm.entity_manager');
                $em->persist($activePeriode);
                $em->flush();
                
                return $this->render('AppBundle:ActivePeriode:patch_active_periode.html.twig', array(
                    "form"=>$form->createView(), "message"=>"Periode modifiée"
                ));
            }
        }
        
        return $this->render('AppBundle:ActivePeriode:patch_active_periode.html.twig', array(
            "form"=>$form->createView()
        ));
    }

}
