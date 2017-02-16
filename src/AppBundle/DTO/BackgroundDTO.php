<?php

namespace AppBundle\DTO;

/**
 * Description of BackgroundDTO
 *
 * @author grand coco
 */
class BackgroundDTO {
    private $src;
    private $heureDate;
    
    function getSrc() {
        return $this->src;
    }

    function getHeureDate() {
        return $this->heureDate;
    }

    function setSrc($src) {
        $this->src = $src;
    }

    function setHeureDate($heureDate) {
        $this->heureDate = $heureDate;
    }


}
