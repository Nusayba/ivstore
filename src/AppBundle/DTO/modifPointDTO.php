<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of modifPointDTO
 *
 * @author grand coco
 */
class modifPointDTO {
    private $x;
    private $y;
    private $position;
    private $utilisateur;
    
    function getX() {
        return $this->x;
    }

    function getY() {
        return $this->y;
    }

    function getPosition() {
        return $this->position;
    }

    function setX($x) {
        $this->x = $x;
    }

    function setY($y) {
        $this->y = $y;
    }

    function setPosition($position) {
        $this->position = $position;
    }
    
    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }




}
