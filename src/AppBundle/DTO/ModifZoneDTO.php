<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of ModifZoneDTO
 *
 * @author grand coco
 */
class ModifZoneDTO {
    private $id;
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
}
