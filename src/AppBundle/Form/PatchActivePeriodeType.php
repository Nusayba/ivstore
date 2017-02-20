<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of PatchActivePeriodeType
 *
 * @author grand coco
 */
class PatchActivePeriodeType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('PATCH')
                ->add('nom')
                ->add('dateDebut', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('dateFin', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('modifier', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
