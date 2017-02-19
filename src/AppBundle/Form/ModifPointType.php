<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ModifPointType
 *
 * @author grand coco
 */
class ModifPointType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('PATCH')
                ->add('modifier le point', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
    //put your code here
}
