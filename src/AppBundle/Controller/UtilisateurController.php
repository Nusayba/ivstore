<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UtilisateurController extends Controller
{
    /**
     * @Route("/getUtilisateurs")
     */
    public function getUtilisateursAction()
    {
        return $this->render('AppBundle:Utilisateur:get_utilisateurs.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/getUtilisateur")
     */
    public function getUtilisateurAction()
    {
        return $this->render('AppBundle:Utilisateur:get_utilisateur.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/postUtilisateur")
     */
    public function postUtilisateurAction()
    {
        return $this->render('AppBundle:Utilisateur:post_utilisateur.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/patchUtilisateur")
     */
    public function patchUtilisateurAction()
    {
        return $this->render('AppBundle:Utilisateur:patch_utilisateur.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeUtilisateur")
     */
    public function removeUtilisateurAction()
    {
        return $this->render('AppBundle:Utilisateur:remove_utilisateur.html.twig', array(
            // ...
        ));
    }

}
