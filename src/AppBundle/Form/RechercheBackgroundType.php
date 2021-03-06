<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of RechercheBackgroundType
 *
 * @author grand coco
 */
class RechercheBackgroundType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->setMethod('GET')
                ->add('heureDate', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('Rechercher', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }

}
