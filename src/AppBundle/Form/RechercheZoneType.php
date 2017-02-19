<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of RechercheZoneType
 *
 * @author grand coco
 */
class RechercheZoneType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->setMethod('GET')
                ->add('nom')
                ->add('Rechercher', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }
}
