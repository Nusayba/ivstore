<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ActivePeriodeType
 *
 * @author grand coco
 */
class ActivePeriodeType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('POST')
                ->add('nom')
                ->add('dateDebut', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('dateFin', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('activer', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
