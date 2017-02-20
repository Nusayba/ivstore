<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Zone;
use Symfony\Component\HttpFoundation\Request;

class ZoneController extends Controller
{
    /**
     * @Route("/zones/", name="get_zones")
     * @Method({"GET"})
     */
    public function getZonesAction(Request $request)
    {
        
        
        //création du formulaire de recherche
        $dtoRecherche = new \AppBundle\DTO\ZoneDTO();
        
        $form=$this->createForm(\AppBundle\Form\RechercheZoneType::class, $dtoRecherche);
        $form->handleRequest($request);
        
        
        $dto = new \AppBundle\DTO\AddPointDTO();
        $dto2 = new \AppBundle\DTO\RemovePointDTO();
        $dto3 = new \AppBundle\DTO\modifPointDTO();
        $dto4= new \AppBundle\DTO\ModifZoneDTO();
        
        //Si formulaire recherche submit
        if( $form->isSubmitted() && $form->isValid() ){
            //recherche des zones
            $nom=$dtoRecherche->getNom();
            $attributZones[]= $this->get("historique_service")->rechercheZones($nom);
            foreach ($attributZones as $key => $value) {
                foreach ($value as $key=> $zone){
                    $id=$zone->getId();
                    // création du tableau de formulaire d'ajout de point
                    $tabForm[$key]=$this->createForm(\AppBundle\Form\AddPointType::class, $dto, array('action'=>$id.'/points'))
                                        ->submit($request->request->all())
                                        ->createView();
                    // création du tableau de formulaire de modification de zone
                    $tabForm4[$key]=$this->createForm(\AppBundle\Form\ModifZoneType::class, $dto4, array('action'=>$id))
                                        ->submit($request->request->all())
                                        ->createView();
                    // création du tableau de formulaire de suppression de zone
                    $tabForm5[$key]=$this->createForm(\AppBundle\Form\RemoveZoneType::class, $dto2, array('action'=>$id))
                                        ->submit($request->request->all())
                                        ->createView();
                    // création du tableau de formulaire d'ajout d'une période d'activité
                    $tabForm6[$key]=$this->createForm(\AppBundle\Form\AddPeriodeType::class, $dto2, array('action'=>$id.'/activePeriodes'))
                                        ->submit($request->request->all())
                                        ->createView();
                    // création du tableau de formulaire d'affichage des périodes d'activité
                    $tabForm7[$key]=$this->createForm(\AppBundle\Form\GetPeriodeType::class, $dto2, array('action'=>$id.'/activePeriodes'))
                                        ->submit($request->request->all())
                                        ->createView();
                }
            
                
            }
            

            //création du tableau de formulaire suppression et modification de point
            foreach ($attributZones as $key => $tabZone) {
                    $id=$zones[$key]->getId();
                    $points= NULL;
                    $points=$tabZone[0]->getPoints();
                    if(! $points== NULL){
                       foreach ($points as $keyPoint => $point) {
                            $id2=$point->getId();
                            $tabForm2[]=$this->createForm(\AppBundle\Form\RemovePointType::class, $dto2, array('action'=>$id.'/points/'.$id2))
                                                    ->submit($request->request->all())
                                                    ->createView();
                            $tabForm3[]=$this->createForm(\AppBundle\Form\ModifPointType::class, $dto3, array('action'=>$id.'/points/'.$id2))
                                                    ->submit($request->request->all())
                                                    ->createView();
                        } 
                       

                    }

                
            }
            
            if(isset($tabForm2)){
                return $this->render('AppBundle:Zone:get_zones.html.twig', array(
                        "lastHistoriquezones"=>$attributZones, "tabForm"=>$tabForm, "tabForm2"=>$tabForm2,
                        "tabForm3"=>$tabForm3, "tabForm4"=>$tabForm4, "tabForm5"=>$tabForm5,
                        "tabForm6"=>$tabForm6,"tabForm7"=>$tabForm7,'form'=>$form->createView()
                    ));
            }
            
            return $this->render('AppBundle:Zone:get_zones.html.twig', array(
            "lastHistoriquezones"=>$attributZones, "tabForm"=>$tabForm, "tabForm4"=>$tabForm4, "tabForm5"=>$tabForm5,
               "tabForm6"=>$tabForm6 ,"tabForm7"=>$tabForm7,'form'=>$form->createView()
        ));

        }
        
        $zones = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->findAll();
        
        foreach ($zones as $key => $value) {
            
            $zone=$value;
            $attributZones[]=$this->get("historique_service")->findLastHistorique($zone);
        }
        
        foreach ($zones as $key => $value) {
            
                $id=$value->getId();
                // création du tableau de formulaire d'ajout de point
                $tabForm[$key]=$this->createForm(\AppBundle\Form\AddPointType::class, $dto, array('action'=>$id.'/points'))
                                    ->submit($request->request->all())
                                    ->createView();
                // création du tableau de formulaire de modification de zone
                $tabForm4[$key]=$this->createForm(\AppBundle\Form\ModifZoneType::class, $dto4, array('action'=>$id))
                                    ->submit($request->request->all())
                                    ->createView();
                // création du tableau de formulaire de suppression de zone
                $tabForm5[$key]=$this->createForm(\AppBundle\Form\RemoveZoneType::class, $dto2, array('action'=>$id))
                                    ->submit($request->request->all())
                                    ->createView();
                // création du tableau de formulaire dajout d'une période d'activité
                    $tabForm6[$key]=$this->createForm(\AppBundle\Form\AddPeriodeType::class, $dto2, array('action'=>$id.'/activePeriodes'))
                                        ->submit($request->request->all())
                                        ->createView();
                // création du tableau de formulaire d'affichage des périodes d'activité
                    $tabForm7[$key]=$this->createForm(\AppBundle\Form\GetPeriodeType::class, $dto2, array('action'=>$id.'/activePeriodes'))
                                        ->submit($request->request->all())
                                        ->createView();
            }

            //création du tableau de formulaire suppression et modification de point
            foreach ($attributZones as $key => $tabZone) {
                    $id=$zones[$key]->getId();
                    $points= NULL;
                    $points=$tabZone[0]->getPoints();
                    if(! $points== NULL){
                       foreach ($points as $keyPoint => $point) {
                            $id2=$point->getId();
                            $tabForm2[]=$this->createForm(\AppBundle\Form\RemovePointType::class, $dto2, array('action'=>$id.'/points/'.$id2))
                                                    ->submit($request->request->all())
                                                    ->createView();
                            $tabForm3[]=$this->createForm(\AppBundle\Form\ModifPointType::class, $dto3, array('action'=>$id.'/points/'.$id2))
                                                    ->submit($request->request->all())
                                                    ->createView();
                        } 
                       

                    }

                
            }
            if(isset($tabForm2)){
                return $this->render('AppBundle:Zone:get_zones.html.twig', array(
                        "lastHistoriquezones"=>$attributZones, "tabForm"=>$tabForm, "tabForm2"=>$tabForm2,
                        "tabForm3"=>$tabForm3, "tabForm4"=>$tabForm4, "tabForm5"=>$tabForm5,
                        "tabForm6"=>$tabForm6,"tabForm7"=>$tabForm7,'form'=>$form->createView()
                    ));
            }
             
            
        return $this->render('AppBundle:Zone:get_zones.html.twig', array(
            "lastHistoriquezones"=>$attributZones, "tabForm"=>$tabForm, "tabForm4"=>$tabForm4,
            "tabForm5"=>$tabForm5,"tabForm6"=>$tabForm6,"tabForm7"=>$tabForm7, 'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/zones/{id}", name="get_zone")
     * @Method({"GET"})
     */
    public function getZoneAction(Request $request)
    {
        $bzone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id')); 
        
        return $this->render('AppBundle:Zone:get_zone.html.twig', 
                array('zone'=>$zone
        ));
    }

    /**
     * @Route("/zones", name="post_zone")
     * @Method({"POST"})
     */
    public function postZoneAction(Request $request)
    {
        $dto = new \AppBundle\DTO\ZoneDTO();
        $form = $this->createForm(\AppBundle\Form\ZoneType::class, $dto);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $zone = new Zone;
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($zone);
            $em->flush();
            
            $historiqueZone = new \AppBundle\Entity\HistoriqueZone();
            $historiqueZone->setZone($zone);
            $historiqueZone->setAction("create");
            $historiqueZone->setCouleur($dto->getCouleur());
            $historiqueZone->setHeureDate($dto->getHeureDate());
            $historiqueZone->setNom($dto->getNom());
            $historiqueZone->setUtilisateur($dto->getUtilisateur());
            $em2 = $this->get('doctrine.orm.entity_manager');
            $em2->persist($historiqueZone);
            $em2->flush();
            
            
            
            return $this->render('AppBundle:Zone:post_zone.html.twig', array(
                'form'=>$form->createView(), 'message'=>"zone ajouté"
            ));
            
        } else {
            
            return $this->render('AppBundle:Zone:post_zone.html.twig', array(
                'form'=>$form->createView()
            ));
        }
    }

    /**
     * @Route("/zones", name="patch_zone")
     * @Method({"PATCH"})
     */
    public function patchZoneAction(Request $request)
    {
        $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id')); 
        
        $historiqueZone=$this->get("historique_service")->findLastHistorique($zone);
        $dernierHistorique=$historiqueZone[0];
        $form = $this->createForm(\AppBundle\Form\MZoneType::class,$dernierHistorique);
        
        if ($request->isMethod('PATCH')) {
            
            $form->submit($request->request->get($form->getName()), false);
           
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->get('doctrine.orm.entity_manager');
                //je crée le nouvel historique
                $hZone = new \AppBundle\Entity\HistoriqueZone();
                $hZone->setZone($zone);
                $hZone->setAction("modification de la zone");
                $hZone->setCouleur($dernierHistorique->getCouleur());
                $hZone->setHeureDate(new \DateTime());
                $hZone->setNom($dernierHistorique->getNom());
                $hZone->setUtilisateur($dernierHistorique->getUtilisateur());
                
                //ajout des points 
                $points=$dernierHistorique->getPoints();
                foreach ($points as $key => $value) {
                    $hZone->addPoint($value);
                    $em->persist($value);
                }
                
                //ajout de ce nouvel historique
                $em->persist($hZone);
                $em->flush();
                
                return $this->render('AppBundle:Zone:patch_zone.html.twig', array(
                    "form"=>$form->createView(), "message"=>"Zone modifié"
                ));
            }
        }
        
        return $this->render('AppBundle:Zone:patch_zone.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    /**
     * @Route("/zones/{id}", name="delete_zone")
     * @Method({"DELETE"})
     */
    public function removeZoneAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $zone = $em->getRepository('AppBundle:Zone')
                    ->find($request->get('id'));

        if (!$zone) {
            return;
        }

        foreach ($zone->getActivePeriodes() as $activePeriode) {
            $em->remove($activePeriode);
        }
        foreach ($zone->getHistoriques() as $historique) {
            $em->remove($historique);
            foreach ($historique->getPoints() as $point) {
                $em->remove($point);
            }
        }
        $em->remove($zone);
        $em->flush();
        
        return $this->redirectToRoute('get_zones',array('message'=>'Zone supprimer'));
    }

}
