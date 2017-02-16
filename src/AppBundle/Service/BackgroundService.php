<?php

use AppBundle\Entity\Background;

namespace AppBundle\Service;

/**
 * Description of BackgroundService
 *
 * @author grand coco
 */
class BackgroundService {
   /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    function __construct(\Doctrine\ORM\EntityManagerInterface $em) {
        $this->em = $em;
    }
    
    public function rechercheBackground($heureDate) {
        $qb2=$this->em->createQueryBuilder();
            $qb2->select("b");
            $qb2->from("AppBundle:Background", "b");
            $qb2->where("b.heureDate =:heureDate"); 
            $query2 = $qb2->getQuery();

            $query2->setParameter("heureDate",$heureDate);
            $reponse = $query2->getResult();
        
        return $reponse;
    }
}
