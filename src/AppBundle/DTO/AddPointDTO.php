<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of AddPointDTO
 *
 * @author grand coco
 */
class AddPointDTO {
    private $id;
    private $utilisateur;
            function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }



}
