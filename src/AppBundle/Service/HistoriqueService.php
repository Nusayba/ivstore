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
    
    public function rechercheZones($nom) {
        $queryBuilder = $this->em->createQueryBuilder();
        $queryBuilder->select('h');
        $queryBuilder->from('AppBundle:HistoriqueZone','h');
        $queryBuilder->where('h.nom LIKE :nom');
        $queryBuilder->orderBy('h.heureDate', 'DESC');
        $queryBuilder->setParameter('nom', '%'.$nom.'%');
        $historiques = $queryBuilder->getQuery()->getResult();
        
        $zones[]=$historiques[0];
        foreach ($historiques as $key => $historique) {
            $exist=false;
            foreach ($zones as $key2 => $zone) {
                if($historique->getZone()->getId()== $zone->getZone()->getId()){
                    
                    $zones[$key2]=$historique;
                    $exist=true;
                }
            }
            if($exist==false){
                $zones[]=$historique;
            }
        }
        return $zones;
    }
    
}
