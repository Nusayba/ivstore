<?php



namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\DTO\ModifBackgroundDTO as BackgroundDTO;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of DefaultService
 *
 * @author grand coco
 */
class DefaultService {
    
    public function createTabFormModif($entities, $nameEntity, Request $request){
        
        $dtoName='\AppBundle\DTO\Modif'.$nameEntity.'DTO()';
        $type='\AppBundle\Form\Modif'.$nameEntity.'Type::class';
        
        $dto = new BackgroundDTO;
        
            foreach ($entities as $key => $value) {
                $id=$value->getId();
                $tabForm[$key]=$this->createForm($type, $dto, array('action'=>$id))
                                    ->submit($request->request->all())
                                    ->createView();
                            
            }
        return $tabForm;
    } 
    
    public function createTabFormRemove($entities, $nameEntity,  $request){
        $dtoName='\AppBundle\DTO\Remove'.$nameEntity.'DTO()';
        $type='\AppBundle\Form\Remove'.$nameEntity.'Type::class';
        
        $dto = new $dtoName;
        
            foreach ($entities as $key => $value) {
                $id=$value->getId();
                $tabForm[$key]=$this->createForm($type, $dto, array('action'=>$id))
                                    ->submit($request->request->all())
                                    ->createView();
            }
        return $tabForm;
    }
}
