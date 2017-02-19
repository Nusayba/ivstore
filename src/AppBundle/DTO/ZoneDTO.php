<?php



namespace AppBundle\DTO;

/**
 * Description of ZoneDTO
 *
 * @author grand coco
 */
class ZoneDTO {
    private $nom;
    private $couleur;
    private $heureDate;
    private $utilisateur;
    
    function getNom() {
        return $this->nom;
    }

    function getCouleur() {
        return $this->couleur;
    }

    function getHeureDate() {
        return $this->heureDate;
    }


    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    function setHeureDate($heureDate) {
        $this->heureDate = $heureDate;
    }


    function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }


}
