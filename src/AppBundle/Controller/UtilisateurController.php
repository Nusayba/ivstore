<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Utilisateur;

class UtilisateurController extends Controller
{
    /**
     * @Route("/utilisateurs/", name="get_utilisateurs")
     * @Method({"GET"})
     */
    public function getUtilisateursAction(Request $request)
    {
        //on affiche tous les Utilisateurs en base
        $utilisateurs = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Utilisateur')
                ->findAll();
       
        // création du tableau de formulaire de suppression
        $dto = new \AppBundle\DTO\RemoveUtilisateurDTO();
        foreach ($utilisateurs as $key => $value) {
            $id=$value->getId();
            $tabForm[$key]=$this->createForm(\AppBundle\Form\RemoveUtilisateurType::class, $dto, array('action'=>$id))
                                    ->submit($request->request->all())
                                    ->createView();
        }
        
        return $this->render('AppBundle:Utilisateur:get_utilisateurs.html.twig', 
                array('utilisateurs'=>$utilisateurs,
                    "tabForm"=>$tabForm
        ));
    }

    

    /**
     * @Route("/utilisateurs", name="post_utilisateurs")
     * @Method({"POST"})
     */
    public function postUtilisateurAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(\AppBundle\Form\UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($utilisateur);
            $em->flush();
            
            return $this->render('AppBundle:Utilisateur:post_utilisateur.html.twig', array(
                'form'=>$form->createView(), 'message'=>"utilisateur ajouté"
            ));
            
        } else {
            
            return $this->render('AppBundle:Utilisateur:post_utilisateur.html.twig', array(
                'form'=>$form->createView()
            ));
        }
    }

    /**
     * @Route("/utilisateurs/{id}", name="delete_utilisateurs")
     * @Method({"DELETE"})
     */
    public function removeUtilisateursAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $utilisateur = $em->getRepository('AppBundle:Utilisateur')
                    ->find($request->get('id'));
        
        if ($utilisateur) {
            $em->remove($utilisateur);
            $em->flush();
        }
        return $this->redirectToRoute('get_utilisateurs',array('message'=>'Utilisateur supprimer'));
    }

}
