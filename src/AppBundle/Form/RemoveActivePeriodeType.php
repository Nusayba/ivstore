<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of removeActivePeriodeType
 *
 * @author grand coco
 */
class RemoveActivePeriodeType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('DELETE')
                ->add('supprimer la periode', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
