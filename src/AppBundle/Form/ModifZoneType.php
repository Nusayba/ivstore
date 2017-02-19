<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of ModifZoneType
 *
 * @author grand coco
 */
class ModifZoneType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('PATCH')
                ->add('modifier la zone', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
    //put your code here
}
