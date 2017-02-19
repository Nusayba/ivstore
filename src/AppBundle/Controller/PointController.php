<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Point;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;


class PointController extends Controller
{
    /**
     * @Route("/zones/{id}/points/{id2}", name="post_point")
     * @Method({"POST"})
     */
    public function postPointAction(Request $request)
    {
        $dto = new \AppBundle\DTO\modifPointDTO;
        
        
        $form = $this->createForm(\AppBundle\Form\PointType::class, $dto);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //créer le nouveau point
                $em = $this->get('doctrine.orm.entity_manager');
                $newPoint=new Point;
                $newPoint->setX($dto->getX());
                $newPoint->setY($dto->getY());
                $newPoint->setPosition($dto->getPosition());
                $em->persist($newPoint);
                //je récupère le dernier historique
                $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id'));
            
                $historiqueZone= $this->get("historique_service")->findLastHistorique($zone);
                $dernierHistorique=$historiqueZone[0];
                //je change l'action, l'heureDate, et le point
                $hZone = new \AppBundle\Entity\HistoriqueZone();
                $hZone->setZone($zone);
                $hZone->setAction("ajout de points");
                $hZone->setCouleur($dernierHistorique->getCouleur());
                $hZone->setHeureDate(new \DateTime());
                $hZone->setNom($dernierHistorique->getNom());
                $hZone->setUtilisateur($ddto->getUtilisateur());
                
                //ajout des points
                $points=$dernierHistorique->getPoints();
                foreach ($points as $key => $value) {
                    $hZone->addPoint($value);
                    $em->persist($value);
                }
                //j'ajoute le nouveau point
                $hZone->addPoint($newPoint);
                $em->persist($newPoint);
                //ajout de ce nouvel historique
                $em->persist($hZone);
                $em->flush();
            
            return $this->render('AppBundle:Point:post_point.html.twig', array(
                'form'=>$form->createView(), 'message'=>"point ajouté"
            ));
            
        } else {
            
            return $this->render('AppBundle:Point:post_point.html.twig', array(
                'form'=>$form->createView()
            ));
        }
    }

    /**
     * @Route("/zones/{id}/points/{id2}", name="patch_points")
     * @Method("PATCH")
     */
    public function patchPointsAction(Request $request)
    {
        $point = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Point')
                ->find($request->get('id2')); 
        
        $dto = new \AppBundle\DTO\modifPointDTO;
        $dto->setX($point->getX());
        $dto->setY($point->getY());
        $dto->setPosition($point->getPosition());
        
        $form = $this->createForm(\AppBundle\Form\MPointType::class,$dto);
        
        if ($request->isMethod('PATCH')) {
            
            $form->submit($request->request->get($form->getName()), false);
           
            if ($form->isSubmitted() && $form->isValid()) {
                
                //créer le nouveau point
                $em = $this->get('doctrine.orm.entity_manager');
                $newPoint=new Point;
                $newPoint->setX($dto->getX());
                $newPoint->setY($dto->getY());
                $newPoint->setPosition($dto->getPosition());
                $em->persist($newPoint);
                //je récupère le dernier historique
                $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id'));
            
                $historiqueZone= $this->get("historique_service")->findLastHistorique($zone);
                $dernierHistorique=$historiqueZone[0];
                //je change l'action, l'heureDate, et le point
                $hZone = new \AppBundle\Entity\HistoriqueZone();
                $hZone->setZone($zone);
                $hZone->setAction("modification de points");
                $hZone->setCouleur($dernierHistorique->getCouleur());
                $hZone->setHeureDate(new \DateTime());
                $hZone->setNom($dernierHistorique->getNom());
                $hZone->setUtilisateur($dto->getUtilisateur());
                
                //ajout des points sauf celui modifié
                $points=$dernierHistorique->getPoints();
                foreach ($points as $key => $value) {
                    if( $value->getId()!=$request->get('id2')){
                        $hZone->addPoint($value);
                        $em->persist($value);
                    }
                }
                //j'ajoute le nouveau point
                $hZone->addPoint($newPoint);
                $em->persist($newPoint);
                //ajout de ce nouvel historique
                $em->persist($hZone);
                $em->flush();
                
                return $this->render('AppBundle:Point:patch_point.html.twig', array(
                    "form"=>$form->createView(), "message"=>"Point modifié"
                ));
            }
        }
        
        return $this->render('AppBundle:Point:patch_point.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    /**
     * @Route("/zones/{id}/points/{id2}", name="delete_points")
     * @Method({"DELETE"})
     */
    public function RemovePointsAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $point = $em->getRepository('AppBundle:Point')
                    ->find($request->get('id2'));
        
        if ($point) {
            $em->remove($point);
            $em->flush();
        }
        
        
                //je récupère le dernier historique
                $zone = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Zone')
                ->find($request->get('id'));
                $historiqueZone= $this->get("historique_service")->findLastHistorique($zone);
                $dernierHistorique=$historiqueZone[0];
                //je change l'action, l'heureDate, et le point
                $hZone = new \AppBundle\Entity\HistoriqueZone();
                $hZone->setZone($zone);
                $hZone->setAction("suppression de points");
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
        return $this->redirectToRoute('get_zones',array('message'=>'point supprimer'));
    }

}
