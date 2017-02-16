<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Response;

/**
 * Description of HistoriqueService
 *
 * @author grand coco
 */
class HistoriqueService {
    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    function __construct(\Doctrine\ORM\EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function findLastHistorique($idZone) {
        //$historique = $this->em
         //       ->getRepository('AppBundle:HistoriqueZone')
          //      ->find($idZone);
        
        $queryBuilder = $this->em->createQueryBuilder();
        $queryBuilder->select('h');
        $queryBuilder->from('AppBundle:HistoriqueZone','h');
        $queryBuilder->where('h.zone =:zone');
        $queryBuilder->orderBy('h.heureDate', 'DESC');
        $queryBuilder->setParameter('zone', $idZone);
        $queryBuilder->setMaxResults(1);
        $historique = $queryBuilder->getQuery()->getResult();
        return $historique;
    }
}
