<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of AddPeriodeType
 *
 * @author grand coco
 */
class AddPeriodeType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('POST')
                ->add('activer la zone', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
