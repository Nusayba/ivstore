<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of GetPeriodeType
 *
 * @author grand coco
 */
class GetPeriodeType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('GET')
                ->add("voir les périodes d'activité de la zone", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
